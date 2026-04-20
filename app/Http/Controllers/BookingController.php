<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Package;
use App\Models\Room;
use App\Services\AvailabilityService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $bookings = Booking::with(['user', 'room', 'package'])->paginate(10);
            return view('admin.bookings.index', compact('bookings'));
        }

        $bookings = Booking::with(['room', 'package'])
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('customer.bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'package_id' => 'required|exists:packages,id',
                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d|after:start_date',
                'room_id' => 'required|exists:rooms,id',
                'events' => 'nullable|array',
                'events.*' => 'exists:events,id',
            ]);

            $room = Room::findOrFail($request->room_id);
            $package = Package::findOrFail($request->package_id);

            if (!$room->is_active) {
                return redirect()->back()->withErrors(['room' => 'This room is unavailable.']);
            }

            $overlappingBookings = Booking::where('room_id', $request->room_id)
                ->where('status', '!=', 'cancelled')
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                          ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                          ->orWhere(function ($q) use ($request) {
                              $q->where('start_date', '<=', $request->start_date)
                                ->where('end_date', '>=', $request->end_date);
                          });
                })
                ->count();

            if ($overlappingBookings >= $room->total_stock) {
                return redirect()->back()->withErrors(['date' => 'Room fully booked for these dates.']);
            }

            // 🔍 DEBUG: Log input data
            \Log::info('📝 BOOKING STORE - INPUT DATA', [
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'room_id' => $request->room_id,
                'package_id' => $request->package_id,
                'events' => $request->events ?? [],
            ]);

            // Calculate nights correctly
            $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
            $nights = $endDate->diffInDays($startDate);
            $nights = $nights > 0 ? $nights : 1;

            // 🔍 DEBUG: Log calculation step 1
            \Log::info('📅 NIGHTS CALCULATION', [
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
                'calculated_nights' => $nights,
            ]);

            // Calculate total price
            $roomCharge = $room->price_per_night * $nights;
            $totalPrice = $package->base_price + $roomCharge;

            // 🔍 DEBUG: Log calculation step 2
            \Log::info('💰 ROOM PRICE CALCULATION', [
                'base_price' => $package->base_price,
                'room_price_per_night' => $room->price_per_night,
                'nights' => $nights,
                'room_charge' => $roomCharge,
                'total_before_events' => $totalPrice,
            ]);

            // Add event prices
            $eventIds = [];
            $eventTotal = 0;
            if ($request->has('events') && is_array($request->events)) {
                $events = Event::whereIn('id', $request->events)->get();
                foreach ($events as $event) {
                    $totalPrice += $event->price;
                    $eventTotal += $event->price;
                    $eventIds[$event->id] = ['quantity' => 1];
                }

                // 🔍 DEBUG: Log events
                \Log::info('🎉 EVENTS CALCULATION', [
                    'event_count' => count($eventIds),
                    'events_total' => $eventTotal,
                    'total_after_events' => $totalPrice,
                ]);
            }

            // 🔍 DEBUG: Final total before saving
            \Log::info('✅ FINAL CALCULATION BEFORE SAVE', [
                'package_base' => $package->base_price,
                'room_charge' => $roomCharge,
                'events_total' => $eventTotal,
                'final_total_price' => $totalPrice,
            ]);

            // Create booking
            $booking = Booking::create([
                'user_id' => auth()->id(),
                'package_id' => $request->package_id,
                'room_id' => $request->room_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'payment_status' => 'pending',
            ]);

            // 🔍 DEBUG: Verify saved
            \Log::info('💾 BOOKING SAVED TO DB', [
                'booking_id' => $booking->id,
                'stored_total_price' => $booking->total_price,
            ]);

            // Attach events
            if (!empty($eventIds)) {
                $booking->events()->attach($eventIds);
            }

            return redirect()->route('payment.show', $booking->id);

        } catch (\Exception $e) {
            \Log::error('❌ Booking creation failed: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'Failed to create booking: ' . $e->getMessage()]);
        }
    }

    public function payment(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('bookings.payment', [
            'booking' => $booking->load(['package', 'room', 'events']),
        ]);
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $user    = Auth::user();

        if ($user->role !== 'admin' && $booking->user_id !== $user->id) {
            abort(403);
        }

        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return back()->withErrors(['cancel' => 'Cette réservation ne peut pas être annulée.']);
        }

        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Réservation annulée avec succès.');
    }

    public function processPayment(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'payment_method' => 'required|in:credit_card,paypal',
            'card_name' => 'nullable|string',
            'card_number' => 'nullable|string',
            'expiry_date' => 'nullable|string',
            'cvc' => 'nullable|string',
        ]);

        // Update booking status to confirmed and payment to paid
        $booking->update([
            'status' => 'confirmed',
            'payment_status' => 'paid',
        ]);

        return redirect()->route('bookings.success', $booking->id)
            ->with('success', 'Booking confirmed successfully! Your payment has been processed.');
    }

    public function success(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('bookings.success', [
            'booking' => $booking->load(['package', 'room', 'events']),
        ]);
    }
}

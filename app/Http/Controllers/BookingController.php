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
        \Log::info('📝 Booking store() called', ['user_id' => auth()->id()]);
        \Log::info('Form data received:', $request->all());

        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'room_id' => 'required|exists:rooms,id',
            'events' => 'nullable|array',
            'events.*' => 'exists:events,id',
        ]);

        \Log::info('✅ Validation passed', $validated);

        $room = Room::findOrFail($request->room_id);
        $package = Package::findOrFail($request->package_id);

        if (!$room->is_active) {
            \Log::warning('Room not active');
            return redirect()->back()->with('error', 'This room is currently unavailable for maintenance.');
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
            \Log::warning('Room fully booked');
            return redirect()->back()->with('error', 'This room is fully booked for the selected dates.');
        }

        $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $nights = $endDate->diffInDays($startDate);
        if ($nights === 0) {
            $nights = 1;
        }

        \Log::info('📅 Date calculation:', [
            'start' => $request->start_date,
            'end' => $request->end_date,
            'nights' => $nights,
            'room_price_per_night' => $room->price_per_night
        ]);

        $totalPrice = $package->base_price + ($room->price_per_night * $nights);

        \Log::info('💰 Price calculation:', [
            'base_price' => $package->base_price,
            'room_charge' => $room->price_per_night * $nights,
            'total_before_events' => $totalPrice
        ]);

        $eventIds = [];
        if ($request->has('events')) {
            $events = Event::whereIn('id', $request->events)->get();
            foreach ($events as $event) {
                $totalPrice += $event->price;
                $eventIds[$event->id] = ['quantity' => 1];
            }
            \Log::info('✅ Events added', ['event_count' => count($eventIds), 'total_price' => $totalPrice]);
        }

        \Log::info('🔍 Creating booking with data:', [
            'user_id' => auth()->id(),
            'package_id' => $request->package_id,
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);

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

        \Log::info('✅ Booking created', ['booking_id' => $booking->id, 'total_price' => $booking->total_price]);

        if (!empty($eventIds)) {
            $booking->events()->attach($eventIds);
            \Log::info('✅ Events attached');
        }

        \Log::info('🎯 Redirecting to payment page', ['booking_id' => $booking->id]);
        return redirect()->route('payment.show', $booking->id);
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

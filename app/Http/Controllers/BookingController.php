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
use Stripe\Checkout\Session;
use Stripe\Stripe;

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

            // Calculate nights using simple DateTime diff (foolproof method)
            $startDate = new \DateTime($request->start_date);
            $endDate = new \DateTime($request->end_date);
            $interval = $endDate->diff($startDate);
            $nights = (int)$interval->format('%a'); // Get days between dates
            $nights = $nights > 0 ? $nights : 1; // Minimum 1 night

            // Calculate total price: BASE + (ROOM * NIGHTS) + EVENTS
            $roomCharge = $room->price_per_night * $nights;
            $totalPrice = $package->base_price + $roomCharge;

            // Add event prices
            $eventIds = [];
            if ($request->has('events') && is_array($request->events)) {
                $events = Event::whereIn('id', $request->events)->get();
                foreach ($events as $event) {
                    $totalPrice += $event->price;
                    $eventIds[$event->id] = ['quantity' => 1];
                }
            }

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

            // Attach events
            if (!empty($eventIds)) {
                $booking->events()->attach($eventIds);
            }

            return redirect()->route('payment.show', $booking->id);

        } catch (\Exception $e) {
            \Log::error('Booking creation failed: ' . $e->getMessage());
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

        try {
            // Set Stripe API key
            Stripe::setApiKey(config('services.stripe.secret_key'));

            // Load relations for product info
            $booking->load(['package', 'room', 'events']);

            // Create line item with package name and total price in cents (EUR)
            $checkoutSession = Session::create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'eur',
                            'unit_amount' => (int)($booking->total_price * 100), // Convert to cents
                            'product_data' => [
                                'name' => $booking->package->name,
                                'description' => "{$booking->room->type} Room ({$booking->start_date} to {$booking->end_date})",
                                'images' => $booking->package->image_path ? [
                                    url('storage/' . $booking->package->image_path)
                                ] : [],
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'customer_email' => auth()->user()->email,
                'success_url' => route('bookings.stripe.success', $booking->id) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('bookings.stripe.cancel', $booking->id),
            ]);

            // Redirect to Stripe Checkout
            return redirect()->away($checkoutSession->url);

        } catch (\Exception $e) {
            \Log::error('Stripe checkout creation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
        }
    }

    public function stripeSuccess(Booking $booking, Request $request)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        try {
            // Verify session exists with Stripe to ensure legitimate payment
            Stripe::setApiKey(config('services.stripe.secret_key'));

            $sessionId = $request->query('session_id');
            if ($sessionId) {
                $session = Session::retrieve($sessionId);

                if ($session->payment_status === 'paid') {
                    // Update booking to confirmed and payment to paid
                    $booking->update([
                        'status' => 'confirmed',
                        'payment_status' => 'paid',
                    ]);
                }
            }

            return redirect()->route('bookings.success', $booking->id)
                ->with('success', 'Payment successful! Your booking is confirmed.');

        } catch (\Exception $e) {
            \Log::error('Stripe success callback failed: ' . $e->getMessage());
            return redirect()->route('bookings.success', $booking->id)
                ->with('warning', 'Payment completed. Please contact support if you have issues.');
        }
    }

    public function stripeCancel(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return redirect()->route('payment.show', $booking->id)
            ->with('error', 'Payment was cancelled. Please try again or contact support.');
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

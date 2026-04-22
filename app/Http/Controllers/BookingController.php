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
            $request->validate([
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

            $booked = Booking::where('room_id', $request->room_id)
                ->where('status', '!=', 'cancelled')
                ->where('start_date', '<', $request->end_date)
                ->where('end_date', '>', $request->start_date)
                ->count();

            if ($booked >= $room->total_stock) {
                return redirect()->back()->withErrors(['date' => 'Room fully booked for these dates.']);
            }

            $startDate = new \DateTime($request->start_date);
            $endDate = new \DateTime($request->end_date);
            $nights = max((int)$endDate->diff($startDate)->format('%a'), 1);

            $totalPrice = $package->base_price + ($room->price_per_night * $nights);

            if ($request->has('events')) {
                $events = Event::whereIn('id', $request->events)->get();
                foreach ($events as $event) {
                    $totalPrice += $event->price;
                }
            }

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'package_id' => $request->package_id,
                'room_id' => $request->room_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            if ($request->has('events')) {
                $booking->events()->attach($request->events);
            }

            return redirect()->route('payment.show', $booking->id);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
            abort(403);
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret_key'));
            $booking->load(['package', 'room']);

            $session = Session::create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => (int)($booking->total_price * 100),
                        'product_data' => [
                            'name' => $booking->package->name,
                            'description' => "{$booking->room->type} Room ({$booking->start_date} to {$booking->end_date})",
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'customer_email' => auth()->user()->email,
                'success_url' => route('bookings.stripe.success', $booking->id) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('bookings.stripe.cancel', $booking->id),
            ]);

            return redirect()->away($session->url);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function stripeSuccess(Booking $booking, Request $request)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret_key'));
            $sessionId = $request->query('session_id');

            if ($sessionId) {
                $session = Session::retrieve($sessionId);
                if ($session->payment_status === 'paid') {
                    $booking->update(['status' => 'confirmed']);
                    $booking->payments()->create([
                        'stripe_session_id' => $sessionId,
                        'amount' => $booking->total_price,
                        'currency' => 'EUR',
                        'status' => 'paid',
                    ]);
                }
            }

            return redirect()->route('bookings.success', $booking->id)
                ->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            return redirect()->route('bookings.success', $booking->id)
                ->with('warning', 'Payment completed.');
        }
    }

    public function stripeCancel(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        return redirect()->route('payment.show', $booking->id)
            ->with('error', 'Payment cancelled. Please try again.');
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

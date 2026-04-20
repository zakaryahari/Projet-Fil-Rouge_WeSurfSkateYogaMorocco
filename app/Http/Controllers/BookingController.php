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
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'room_id' => 'required|exists:rooms,id',
            'events' => 'nullable|array',
            'events.*' => 'exists:events,id',
        ]);

        $room = Room::findOrFail($request->room_id);
        $package = Package::findOrFail($request->package_id);

        if (!$room->is_active) {
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
            return redirect()->back()->with('error', 'This room is fully booked for the selected dates.');
        }

        $nights = now()->parse($request->end_date)->diffInDays(now()->parse($request->start_date));
        if ($nights === 0) {
            $nights = 1;
        }

        $totalPrice = $package->base_price + ($room->price_per_night * $nights);

        $eventIds = [];
        if ($request->has('events')) {
            $events = Event::whereIn('id', $request->events)->get();
            foreach ($events as $event) {
                $totalPrice += $event->price;
                $eventIds[$event->id] = ['quantity' => 1];
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
            'payment_status' => 'pending',
        ]);

        if (!empty($eventIds)) {
            $booking->events()->attach($eventIds);
        }

        return redirect()->route('payment.show', $booking->id);
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
}

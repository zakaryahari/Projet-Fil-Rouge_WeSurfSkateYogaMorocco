<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'room', 'package')
                          ->latest()
                          ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,finished,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.bookings.index')
                        ->with('success', 'Booking status updated successfully.');
    }
}

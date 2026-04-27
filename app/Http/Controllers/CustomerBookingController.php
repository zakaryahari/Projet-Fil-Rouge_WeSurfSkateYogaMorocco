<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CustomerBookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     */
    public function index(Request $request)
    {
        $query = auth()->user()->bookings()
            ->with(['package', 'room', 'user']);

        
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        $bookings = $query->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('bookings.my-bookings', [
            'bookings' => $bookings,
            'statuses' => ['pending', 'confirmed', 'cancelled', 'finished'],
            'currentStatus' => $request->get('status'),
        ]);
    }
}

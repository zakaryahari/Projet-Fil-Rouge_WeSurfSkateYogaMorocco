<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Room;
use App\Services\AvailabilityService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request, AvailabilityService $availability)
    {
        $request->validate([
            'room_id'    => 'required|exists:rooms,id',
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        if (!$availability->isRoomAvailable($request->room_id, $request->start_date, $request->end_date)) {
            return back()->withErrors(['availability' => 'Chambre non disponible pour ces dates.']);
        }

        $room    = Room::findOrFail($request->room_id);
        $package = Package::findOrFail($request->package_id);

        $startDate = Carbon::parse($request->start_date);
        $endDate   = Carbon::parse($request->end_date);
        $nights    = $startDate->diffInDays($endDate);

        $totalPrice = ($room->price * $nights) + $package->price;

        $booking = Booking::create([
            'user_id'    => Auth::id(),
            'room_id'    => $request->room_id,
            'package_id' => $request->package_id,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'status'     => 'pending',
            'totalPrice' => $totalPrice,
        ]);

        return redirect()->route('payment.simulate', $booking->id);
    }
}

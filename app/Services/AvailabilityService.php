<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;

class AvailabilityService
{
    public function isRoomAvailable($roomId, $startDate, $endDate)
    {
        $room = Room::findOrFail($roomId);

        $activeBookings = Booking::where('room_id', $roomId)
            ->whereIn('status', ['pending', 'confirmed', 'finished'])
            ->where('start_date', '<', $endDate)
            ->where('end_date', '>', $startDate)
            ->count();

        return $activeBookings < $room->total_stock;
    }
}

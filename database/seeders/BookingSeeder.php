<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = [
            ['user_id' => 2, 'room_id' => 1, 'package_id' => 1, 'start_date' => '2026-06-01', 'end_date' => '2026-06-08', 'status' => 'confirmed',  'total_price' => 650.00],
            ['user_id' => 3, 'room_id' => 2, 'package_id' => 2, 'start_date' => '2026-06-05', 'end_date' => '2026-06-12', 'status' => 'pending',    'total_price' => 1600.00],
            ['user_id' => 4, 'room_id' => 3, 'package_id' => 3, 'start_date' => '2026-06-08', 'end_date' => '2026-06-15', 'status' => 'confirmed',  'total_price' => 1080.00],
            ['user_id' => 5, 'room_id' => 4, 'package_id' => 4, 'start_date' => '2026-06-12', 'end_date' => '2026-06-22', 'status' => 'pending',    'total_price' => 1550.00],
            ['user_id' => 6, 'room_id' => 5, 'package_id' => 1, 'start_date' => '2026-06-15', 'end_date' => '2026-06-22', 'status' => 'finished',   'total_price' => 900.00],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}

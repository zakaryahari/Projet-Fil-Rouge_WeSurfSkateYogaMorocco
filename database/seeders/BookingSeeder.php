<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = [
            ['user_id' => 2,  'room_id' => 1, 'package_id' => 1, 'start_date' => '2026-06-01', 'end_date' => '2026-06-04', 'status' => 'confirmed',  'totalPrice' => 650.00],
            ['user_id' => 3,  'room_id' => 2, 'package_id' => 2, 'start_date' => '2026-06-05', 'end_date' => '2026-06-10', 'status' => 'pending',    'totalPrice' => 1600.00],
            ['user_id' => 4,  'room_id' => 3, 'package_id' => 3, 'start_date' => '2026-06-08', 'end_date' => '2026-06-10', 'status' => 'confirmed',  'totalPrice' => 1080.00],
            ['user_id' => 5,  'room_id' => 1, 'package_id' => 4, 'start_date' => '2026-06-12', 'end_date' => '2026-06-19', 'status' => 'pending',    'totalPrice' => 1550.00],
            ['user_id' => 6,  'room_id' => 2, 'package_id' => 5, 'start_date' => '2026-06-15', 'end_date' => '2026-06-25', 'status' => 'confirmed',  'totalPrice' => 3300.00],
            ['user_id' => 7,  'room_id' => 4, 'package_id' => 1, 'start_date' => '2026-06-20', 'end_date' => '2026-06-23', 'status' => 'cancelled',  'totalPrice' => 650.00],
            ['user_id' => 8,  'room_id' => 5, 'package_id' => 2, 'start_date' => '2026-06-22', 'end_date' => '2026-06-27', 'status' => 'finished',   'totalPrice' => 1600.00],
            ['user_id' => 9,  'room_id' => 1, 'package_id' => 3, 'start_date' => '2026-07-01', 'end_date' => '2026-07-03', 'status' => 'pending',    'totalPrice' => 480.00],
            ['user_id' => 10, 'room_id' => 2, 'package_id' => 4, 'start_date' => '2026-07-05', 'end_date' => '2026-07-12', 'status' => 'confirmed',  'totalPrice' => 2250.00],
            ['user_id' => 11, 'room_id' => 3, 'package_id' => 5, 'start_date' => '2026-07-10', 'end_date' => '2026-07-20', 'status' => 'pending',    'totalPrice' => 5300.00],
            ['user_id' => 12, 'room_id' => 4, 'package_id' => 1, 'start_date' => '2026-07-15', 'end_date' => '2026-07-18', 'status' => 'confirmed',  'totalPrice' => 650.00],
            ['user_id' => 13, 'room_id' => 5, 'package_id' => 2, 'start_date' => '2026-07-20', 'end_date' => '2026-07-25', 'status' => 'cancelled',  'totalPrice' => 1600.00],
            ['user_id' => 14, 'room_id' => 1, 'package_id' => 3, 'start_date' => '2026-08-01', 'end_date' => '2026-08-03', 'status' => 'finished',   'totalPrice' => 480.00],
            ['user_id' => 15, 'room_id' => 2, 'package_id' => 4, 'start_date' => '2026-08-05', 'end_date' => '2026-08-12', 'status' => 'pending',    'totalPrice' => 2250.00],
            ['user_id' => 16, 'room_id' => 3, 'package_id' => 5, 'start_date' => '2026-08-15', 'end_date' => '2026-08-25', 'status' => 'confirmed',  'totalPrice' => 5300.00],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}

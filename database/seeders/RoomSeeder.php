<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'type' => 'Standard',
                'capacity' => 2,
                'price_per_night' => 50,
                'total_stock' => 3,
                'is_active' => true,
                'image_path' => 'rooms/standard.jpg',
            ],
            [
                'type' => 'Deluxe',
                'capacity' => 2,
                'price_per_night' => 80,
                'total_stock' => 4,
                'is_active' => true,
                'image_path' => 'rooms/deluxe.jpg',
            ],
            [
                'type' => 'Suite',
                'capacity' => 4,
                'price_per_night' => 150,
                'total_stock' => 2,
                'is_active' => true,
                'image_path' => 'rooms/suite.jpg',
            ],
            [
                'type' => 'Villa',
                'capacity' => 6,
                'price_per_night' => 250,
                'total_stock' => 1,
                'is_active' => true,
                'image_path' => 'rooms/villa.jpg',
            ],
            [
                'type' => 'Beach House',
                'capacity' => 8,
                'price_per_night' => 350,
                'total_stock' => 1,
                'is_active' => true,
                'image_path' => 'rooms/beach-house.jpg',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}

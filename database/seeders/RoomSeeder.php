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
                'name' => 'Shared Room',
                'type' => 'shared',
                'capacity' => 4,
                'price_per_night' => 25,
                'total_stock' => 2,
                'is_active' => true,
                'image_path' => 'rooms/shared.jpg',
            ],
            [
                'name' => 'Double Room',
                'type' => 'private',
                'capacity' => 2,
                'price_per_night' => 80,
                'total_stock' => 4,
                'is_active' => true,
                'image_path' => 'rooms/double.jpg',
            ],
            [
                'name' => 'Single Room',
                'type' => 'private',
                'capacity' => 1,
                'price_per_night' => 50,
                'total_stock' => 2,
                'is_active' => true,
                'image_path' => 'rooms/single.jpg',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['number' => '101', 'type' => 'Single',  'price' => 150.00, 'total_stock' => 3],
            ['number' => '102', 'type' => 'Double',  'price' => 250.00, 'total_stock' => 4],
            ['number' => '103', 'type' => 'Suite',   'price' => 450.00, 'total_stock' => 2],
            ['number' => '104', 'type' => 'Single',  'price' => 150.00, 'total_stock' => 3],
            ['number' => '105', 'type' => 'Double',  'price' => 250.00, 'total_stock' => 4],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}

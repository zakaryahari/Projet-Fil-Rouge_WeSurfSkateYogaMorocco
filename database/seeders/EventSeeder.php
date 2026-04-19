<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Paradise Valley',
                'description' => 'Discover a hidden oasis just outside the city! Paradise Valley offers natural rock pools, lush palm trees, and scenic canyon views — the perfect escape to refresh your body and mind.',
                'event_date' => '2026-04-25 09:00:00',
                'max_participants' => 15,
                'price' => 25,
                'image_path' => 'events/paradise-valley.jpg',
            ],
            [
                'title' => 'Agadir Souk Market',
                'description' => 'Immerse yourself in the heart of Moroccan culture! Explore the lively Agadir Souk full of spices, textiles, handmade crafts, and local treasures you won\'t find anywhere else.',
                'event_date' => '2026-04-26 10:00:00',
                'max_participants' => 20,
                'price' => 10,
                'image_path' => 'events/souk.jpg',
            ],
            [
                'title' => 'Barbecue & DJ Night in the Mountains',
                'description' => 'Wrap up your day with a sunset BBQ and music under the stars. Join us for a night filled with good food, dancing, campfire vibes, and unforgettable memories.',
                'event_date' => '2026-04-24 18:00:00',
                'max_participants' => 30,
                'price' => 35,
                'image_path' => 'events/bbq.jpg',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

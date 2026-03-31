<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            ['name' => 'Surf Session Matin',     'location' => 'Plage Safi',       'date' => '2026-06-01', 'price' => 80.00],
            ['name' => 'Yoga Coucher de Soleil', 'location' => 'Plage Essaouira',  'date' => '2026-06-02', 'price' => 60.00],
            ['name' => 'Skate Park Session',     'location' => 'Skate Park Agadir','date' => '2026-06-03', 'price' => 50.00],
            ['name' => 'Surf Avancé',            'location' => 'Plage Taghazout',  'date' => '2026-06-04', 'price' => 100.00],
            ['name' => 'Méditation Plage',       'location' => 'Plage Oualidia',   'date' => '2026-06-05', 'price' => 40.00],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}

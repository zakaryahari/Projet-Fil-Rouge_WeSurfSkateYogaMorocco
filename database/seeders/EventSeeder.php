<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Coach;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Create coaches for events
        $coach1 = Coach::create(['name' => 'Youssef El Amrani', 'specialty' => 'Adventure', 'years_experience' => 8]);
        $coach2 = Coach::create(['name' => 'Fatima Zahra', 'specialty' => 'Wellness', 'years_experience' => 7]);

        $activities = [
            [
                'coach_id' => $coach1->id,
                'name' => 'Camel Ride Experience',
                'duration_minutes' => 120,
            ],
            [
                'coach_id' => $coach1->id,
                'name' => 'Desert Quad Bike',
                'duration_minutes' => 90,
            ],
            [
                'coach_id' => $coach1->id,
                'name' => 'Sandboarding',
                'duration_minutes' => 60,
            ],
            [
                'coach_id' => $coach2->id,
                'name' => 'Yoga Session',
                'duration_minutes' => 75,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}

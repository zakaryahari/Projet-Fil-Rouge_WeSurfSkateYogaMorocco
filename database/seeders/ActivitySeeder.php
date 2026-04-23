<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Coach;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Create 2 coaches first
        $coaches = Coach::factory(2)->create();

        $activities = [
            ['name' => 'Beginner Surf Lesson',      'duration_minutes' => 60,  'coach_id' => $coaches[0]->id],
            ['name' => 'Advanced Surfing',          'duration_minutes' => 90,  'coach_id' => $coaches[0]->id],
            ['name' => 'Yoga Flow Session',         'duration_minutes' => 45,  'coach_id' => $coaches[1]->id],
            ['name' => 'Skateboard Tricks',         'duration_minutes' => 60,  'coach_id' => $coaches[1]->id],
            ['name' => 'Beach Meditation',         'duration_minutes' => 30,  'coach_id' => $coaches[0]->id],
            ['name' => 'Intermediate Skateboard',  'duration_minutes' => 75,  'coach_id' => $coaches[1]->id],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coach_id'         => \App\Models\Coach::factory(),
            'name'             => $this->faker->randomElement(['Surf Lesson', 'Skateboard Basics', 'Yoga Flow', 'Advanced Surfing', 'Meditation', 'Skate Tricks']),
            'duration_minutes' => $this->faker->randomElement([30, 45, 60, 90, 120]),
            'image_path'       => 'images/activities/' . $this->faker->slug(2) . '.jpg',
        ];
    }
}

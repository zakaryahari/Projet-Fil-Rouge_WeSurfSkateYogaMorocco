<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'    => \App\Models\User::factory(),
            'booking_id' => \App\Models\Booking::factory(),
            'package_id' => \App\Models\Package::factory(),
            'rating'     => $this->faker->numberBetween(1, 5),
            'comment'    => $this->faker->paragraph(),
        ];
    }
}

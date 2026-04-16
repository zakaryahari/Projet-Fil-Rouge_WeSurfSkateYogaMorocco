<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'               => $this->faker->name(),
            'specialty'          => $this->faker->randomElement(['Surf', 'Skate', 'Yoga']),
            'years_experience'   => $this->faker->numberBetween(1, 15),
        ];
    }
}

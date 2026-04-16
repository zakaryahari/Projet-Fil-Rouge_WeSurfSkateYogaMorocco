<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'            => $this->faker->words(2, true) . ' Room',
            'type'            => $this->faker->randomElement(['single', 'double', 'suite', 'dorm']),
            'capacity'        => $this->faker->numberBetween(1, 6),
            'price_per_night' => $this->faker->randomFloat(2, 30, 300),
            'total_stock'     => $this->faker->numberBetween(1, 10),
            'is_active'       => true,
            'image_path'      => 'images/rooms/' . $this->faker->slug(2) . '.jpg',
        ];
    }
}

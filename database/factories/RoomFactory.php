<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type'            => $this->faker->randomElement(['Standard', 'Deluxe', 'Suite', 'Villa', 'Beach House']),
            'capacity'        => $this->faker->numberBetween(1, 6),
            'price_per_night' => $this->faker->randomFloat(2, 30, 300),
            'total_stock'     => $this->faker->numberBetween(1, 10),
            'is_active'       => true,
            'image_path'      => 'rooms/' . $this->faker->slug(2) . '.jpg',
        ];
    }
}

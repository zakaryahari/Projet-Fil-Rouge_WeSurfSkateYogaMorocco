<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->randomElement(['Surf & Stay', 'Skate Explorer', 'Yoga Retreat', 'Full Experience', 'Weekend Warrior']) . ' ' . $this->faker->randomElement(['Package', 'Deal', 'Bundle']),
            'description'   => $this->faker->paragraph(3),
            'duration_days' => $this->faker->randomElement([3, 5, 7, 10, 14]),
            'base_price'    => $this->faker->randomFloat(2, 200, 2000),
            'image_path'    => 'images/packages/' . $this->faker->slug(2) . '.jpg',
        ];
    }
}

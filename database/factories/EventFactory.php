<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'            => $this->faker->randomElement(['Sunset Surf Session', 'Beach Yoga Morning', 'Skate Competition', 'Full Moon Gathering', 'Surf Film Night', 'Coastal Hike']),
            'description'      => $this->faker->paragraph(2),
            'event_date'       => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'max_participants' => $this->faker->numberBetween(5, 50),
            'price'            => $this->faker->randomFloat(2, 10, 150),
            'image_path'       => 'images/events/' . $this->faker->slug(2) . '.jpg',
        ];
    }
}

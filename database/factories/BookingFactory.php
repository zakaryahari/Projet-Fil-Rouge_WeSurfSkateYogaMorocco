<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+2 months');
        $endDate   = fake()->dateTimeBetween(
            (clone $startDate)->modify('+3 days'),
            (clone $startDate)->modify('+7 days')
        );

        return [
            'start_date'  => $startDate,
            'end_date'    => $endDate,
            'status'      => fake()->randomElement(['pending', 'confirmed', 'finished']),
            'totalPrice'  => 0, 
        ];
    }
}

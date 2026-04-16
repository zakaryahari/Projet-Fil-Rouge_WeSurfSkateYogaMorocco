<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'start_date'      => $startDate,
            'end_date'        => $endDate,
            'total_price'     => fake()->randomFloat(2, 150, 500),
            'payment_status'  => fake()->randomElement(['pending', 'paid', 'failed']),
            'status'          => fake()->randomElement(['pending', 'confirmed', 'finished', 'cancelled']),
        ];
    }
}

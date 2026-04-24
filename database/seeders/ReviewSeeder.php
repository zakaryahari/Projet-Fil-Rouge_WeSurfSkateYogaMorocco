<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'user_id'    => 2,  // Mohammed Hassan
                'booking_id' => 1,  // His booking
                'package_id' => 1,  // Package from his booking
                'rating'     => 5,
                'comment'    => 'Amazing experience! The surf lessons were top-notch and the instructors were incredibly patient. The accommodation was clean and comfortable. I highly recommend this package to anyone looking for an authentic Moroccan surf adventure.',
            ],
            [
                'user_id'    => 3,  // Fatima Bennani
                'booking_id' => 2,  // Her booking
                'package_id' => 2,  // Package from her booking
                'rating'     => 4,
                'comment'    => 'Great package overall! The yoga sessions were relaxing and the location is perfect. Only minor issue was the Wi-Fi connection, but honestly, it was nice to disconnect. The food was delicious and the staff were very welcoming.',
            ],
            [
                'user_id'    => 4,  // Ahmed Boualam
                'booking_id' => 3,  // His booking
                'package_id' => 3,  // Package from his booking
                'rating'     => 5,
                'comment'    => 'Absolutely loved the skate sessions! The coaches are professional and the facilities are excellent. The whole vibe of the camp is amazing - met so many cool people. Will definitely come back next year!',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}

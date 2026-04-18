<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Surf Coaching',
                'description' => 'Master the waves with expert instructors for all levels.',
                'duration_days' => 7,
                'base_price' => 599,
                'image_path' => 'packages/surf-coaching.jpg',
            ],
            [
                'name' => 'Surf And Yoga',
                'description' => 'Enhance balance and flexibility with sunset yoga sessions after surfing.',
                'duration_days' => 7,
                'base_price' => 649,
                'image_path' => 'packages/surf-yoga.jpg',
            ],
            [
                'name' => 'Surf And Skate',
                'description' => 'The perfect combo: thrill of world-class waves and the creativity of surf-skating.',
                'duration_days' => 7,
                'base_price' => 699,
                'image_path' => 'packages/surf-skate.jpg',
            ],
            [
                'name' => 'Surf-Skate & Yoga',
                'description' => 'The ultimate Moroccan retreat combining surf, skate, and tranquility.',
                'duration_days' => 10,
                'base_price' => 899,
                'image_path' => 'packages/surf-skate-yoga.jpg',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Booking;
use App\Models\Coach;
use App\Models\Package;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Seeders ──────────────────────────────────────────────────────────
        $this->call([
            CoachSeeder::class,
            ActivitySeeder::class,
            RoomSeeder::class,
            PackageSeeder::class,
            EventSeeder::class,
        ]);

        // ─── Admin ────────────────────────────────────────────────────────────
        User::create([
            'name'     => 'Admin WeSurf',
            'email'    => 'admin@wesurfskate.com',
            'phone_number' => '+212600000000',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // ─── Customers ────────────────────────────────────────────────────────
        $customers = [
            [
                'name' => 'Mohammed Hassan',
                'email' => 'hassan@example.com',
                'phone_number' => '+212600123456',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Fatima Bennani',
                'email' => 'fatima@example.com',
                'phone_number' => '+212600234567',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Ahmed Boualam',
                'email' => 'ahmed@example.com',
                'phone_number' => '+212600345678',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Leila Karim',
                'email' => 'leila@example.com',
                'phone_number' => '+212600456789',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
            [
                'name' => 'Omar Saidi',
                'email' => 'omar@example.com',
                'phone_number' => '+212600567890',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ],
        ];

        foreach ($customers as $customer) {
            User::create($customer);
        }
    }
}

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
        // ─── Admin ────────────────────────────────────────────────────────────
        User::create([
            'name'     => 'Admin WeSurf',
            'email'    => 'admin@wesurfskate.com',
            'phone_number' => '+212600000000',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // ─── Coaches ──────────────────────────────────────────────────────────
        $youssef = Coach::create(['name' => 'Youssef El Amrani', 'specialty' => 'Surf',  'years_experience' => 8]);
        $amine   = Coach::create(['name' => 'Amine Benali',      'specialty' => 'Surf',  'years_experience' => 5]);
        $omar    = Coach::create(['name' => 'Omar Tazi',         'specialty' => 'Skate', 'years_experience' => 6]);
        $fatima  = Coach::create(['name' => 'Fatima Zahra',      'specialty' => 'Yoga',  'years_experience' => 7]);

        // ─── Rooms ────────────────────────────────────────────────────────────
        Room::create([
            'name' => 'Single Private Room',
            'type' => 'Chambre Single',
            'capacity' => 1,
            'price_per_night' => 50,
            'total_stock' => 5,
            'is_active' => true,
            'image_path' => 'images/rooms/single.jpg',
        ]);
        Room::create([
            'name' => 'Double Comfort Room',
            'type' => 'Chambre Double',
            'capacity' => 2,
            'price_per_night' => 80,
            'total_stock' => 8,
            'is_active' => true,
            'image_path' => 'images/rooms/double.jpg',
        ]);
        Room::create([
            'name' => 'Shared Dorm',
            'type' => 'Dortoir Partagé',
            'capacity' => 6,
            'price_per_night' => 25,
            'total_stock' => 14,
            'is_active' => true,
            'image_path' => 'images/rooms/dorm.jpg',
        ]);

        // ─── Packages ─────────────────────────────────────────────────────────
        Package::create([
            'name' => 'Surf Discovery',
            'description' => 'Initiation au surf avec coach certifié, matériel inclus.',
            'duration_days' => 3,
            'base_price' => 150,
            'is_active' => true,
            'image_path' => 'images/packages/surf-discovery.jpg',
        ]);
        Package::create([
            'name' => 'Yoga Retreat',
            'description' => "Retraite yoga au bord de l'océan, sessions matin et soir.",
            'duration_days' => 5,
            'base_price' => 120,
            'is_active' => true,
            'image_path' => 'images/packages/yoga-retreat.jpg',
        ]);
        Package::create([
            'name' => 'Ultimate Surf & Skate',
            'description' => 'Combinaison surf et skate pour les aventuriers, 6 jours intenses.',
            'duration_days' => 6,
            'base_price' => 180,
            'is_active' => true,
            'image_path' => 'images/packages/ultimate.jpg',
        ]);

        // ─── Activities (Extras) ──────────────────────────────────────────────
        Activity::create([
            'coach_id' => $youssef->id,
            'name' => 'Location Surfboard',
            'duration_minutes' => 120,
        ]);
        Activity::create([
            'coach_id' => $fatima->id,
            'name' => 'Massage Relaxant',
            'duration_minutes' => 60,
        ]);
        Activity::create([
            'coach_id' => $omar->id,
            'name' => 'Sunset Skate Session',
            'duration_minutes' => 90,
        ]);

        // ─── Customers & Bookings ─────────────────────────────────────────────
        $roomIds    = Room::pluck('id');
        $packageIds = Package::pluck('id');

        User::factory(9)->create()->each(function (User $customer) use ($roomIds, $packageIds) {
            $count = rand(1, 2);

            for ($i = 0; $i < $count; $i++) {
                $booking = Booking::factory()->make();

                $customer->bookings()->create([
                    'room_id'    => $roomIds->random(),
                    'package_id' => $packageIds->random(),
                    'start_date' => $booking->start_date,
                    'end_date'   => $booking->end_date,
                    'total_price' => $booking->total_price,
                    'payment_status' => $booking->payment_status,
                    'status'     => $booking->status,
                ]);
            }
        });
    }
}

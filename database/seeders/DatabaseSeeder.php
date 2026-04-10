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
            'phone'    => '+212600000000',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // ─── Coaches ──────────────────────────────────────────────────────────
        $youssef = Coach::create(['name' => 'Youssef El Amrani', 'specialty' => 'Surf',  'years_experience' => 8]);
        $amine   = Coach::create(['name' => 'Amine Benali',      'specialty' => 'Surf',  'years_experience' => 5]);
        $omar    = Coach::create(['name' => 'Omar Tazi',         'specialty' => 'Skate', 'years_experience' => 6]);
        $fatima  = Coach::create(['name' => 'Fatima Zahra',      'specialty' => 'Yoga',  'years_experience' => 7]);

        // ─── Rooms ────────────────────────────────────────────────────────────
        Room::create(['type' => 'Chambre Single',  'price_per_night' => 50, 'total_stock' => 5]);
        Room::create(['type' => 'Chambre Double',  'price_per_night' => 80, 'total_stock' => 8]);
        Room::create(['type' => 'Dortoir Partagé', 'price_per_night' => 25, 'total_stock' => 14]);

        // ─── Packages ─────────────────────────────────────────────────────────
        Package::create(['name' => 'Surf Discovery',        'description' => 'Initiation au surf avec coach certifié, matériel inclus.',          'base_price' => 150]);
        Package::create(['name' => 'Yoga Retreat',          'description' => "Retraite yoga au bord de l'océan, sessions matin et soir.",         'base_price' => 120]);
        Package::create(['name' => 'Ultimate Surf & Skate', 'description' => 'Combinaison surf et skate pour les aventuriers, 6 jours intenses.', 'base_price' => 180]);

        // ─── Activities (Extras) ──────────────────────────────────────────────
        Activity::create(['coach_id' => $youssef->id, 'name' => 'Location Surfboard',   'price' => 20, 'is_extra' => true]);
        Activity::create(['coach_id' => $fatima->id,  'name' => 'Massage Relaxant',     'price' => 35, 'is_extra' => true]);
        Activity::create(['coach_id' => $omar->id,    'name' => 'Sunset Skate Session', 'price' => 25, 'is_extra' => true]);

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
                    'status'     => $booking->status,
                    'totalPrice' => $booking->totalPrice,
                ]);
            }
        });
    }
}

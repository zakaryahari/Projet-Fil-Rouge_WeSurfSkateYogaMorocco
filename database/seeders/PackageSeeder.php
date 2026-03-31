<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            ['title' => 'Surf Initiation',    'description' => 'Pack initiation au surf pour débutants.',       'price' => 200.00, 'duration' => 3],
            ['title' => 'Yoga Retreat',        'description' => 'Retraite yoga complète avec méditation.',       'price' => 350.00, 'duration' => 5],
            ['title' => 'Skate Experience',    'description' => 'Expérience skate pour tous niveaux.',           'price' => 180.00, 'duration' => 2],
            ['title' => 'Surf & Yoga Combo',   'description' => 'Combinaison surf et yoga en bord de mer.',     'price' => 500.00, 'duration' => 7],
            ['title' => 'Full Adventure Pack', 'description' => 'Pack complet surf, skate et yoga au Maroc.',   'price' => 800.00, 'duration' => 10],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

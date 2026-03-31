<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin WeSurf',
            'email'    => 'admin@wesurf.com',
            'phone'    => '0600000000',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        $customers = [
            ['name' => 'Youssef Alami',    'email' => 'youssef@gmail.com',  'phone' => '0611111111'],
            ['name' => 'Sara Benali',      'email' => 'sara@gmail.com',     'phone' => '0622222222'],
            ['name' => 'Karim Idrissi',    'email' => 'karim@gmail.com',    'phone' => '0633333333'],
            ['name' => 'Nadia Chaoui',     'email' => 'nadia@gmail.com',    'phone' => '0644444444'],
            ['name' => 'Omar Tazi',        'email' => 'omar@gmail.com',     'phone' => '0655555555'],
            ['name' => 'Fatima Zahra',     'email' => 'fatima@gmail.com',   'phone' => '0666666666'],
            ['name' => 'Amine Berrada',    'email' => 'amine@gmail.com',    'phone' => '0677777777'],
            ['name' => 'Layla Mansouri',   'email' => 'layla@gmail.com',    'phone' => '0688888888'],
            ['name' => 'Hassan Ouali',     'email' => 'hassan@gmail.com',   'phone' => '0699999999'],
            ['name' => 'Rim Kettani',      'email' => 'rim@gmail.com',      'phone' => '0610101010'],
            ['name' => 'Mehdi Fassi',      'email' => 'mehdi@gmail.com',    'phone' => '0621212121'],
            ['name' => 'Zineb Chraibi',    'email' => 'zineb@gmail.com',    'phone' => '0632323232'],
            ['name' => 'Tariq Bennani',    'email' => 'tariq@gmail.com',    'phone' => '0643434343'],
            ['name' => 'Houda Skalli',     'email' => 'houda@gmail.com',    'phone' => '0654545454'],
            ['name' => 'Rachid Amrani',    'email' => 'rachid@gmail.com',   'phone' => '0665656565'],
        ];

        foreach ($customers as $customer) {
            User::create([
                'name'     => $customer['name'],
                'email'    => $customer['email'],
                'phone'    => $customer['phone'],
                'password' => Hash::make('password'),
                'role'     => 'customer',
            ]);
        }
    }
}

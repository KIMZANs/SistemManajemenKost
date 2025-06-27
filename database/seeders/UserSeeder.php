<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Kost',
            'email' => 'admin@kost.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Penghuni Kost',
            'email' => 'user@kost.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}

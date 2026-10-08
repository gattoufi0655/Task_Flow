<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creer un utilisateur admin
        User::create([
            'name' => 'Admin TaskFlow',
            'email' => 'admin@taskflow.com',
            'password' => Hash::make('password123'),
        ]);

        //creer  quelques utilisateurs de test
        User::create([
            'name' => 'Ahmed Ben Ali',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Fatma Gattoufi',
            'email' => 'fatma@example.com',
            'password' => Hash::make('password123'),
        ]);

    }
}

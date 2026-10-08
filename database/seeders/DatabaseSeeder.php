<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Projet;
use App\Models\Tache;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Créer les utilisateurs
        $this->call(UserSeeder::class);
        // 2. Créer les projets manuels
        $this->call(ProjetSeeder::class);
        // 3. Créer des projets avec factory (10 projets aléatoires)
        \App\Models\Projet::factory(10)->create([
        'user_id' => 1, // Attribuer à l'admin
        ]);
        // 4. Créer des tâches pour chaque projet
        \App\Models\Projet::all()->each(function ($projet) {
        \App\Models\Tache::factory(rand(3, 8))->create([
        'projet_id' => $projet->id,
        ]);
        });
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Projet;
use App\Models\User;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Projet::create([
            'nom' => 'Site E-commerce ISIM',
            'description' => 'Développement d\'une boutique en ligne pour les produits ISIM',
            'statut' => 'en_cours',
            'date_debut' => '2026-04-01',
            'user_id' => 1, // Assurez-vous que cet ID correspond à un utilisateur existant
        ]);

        Projet::create([
            'nom' => 'Application Mobile ISIM',
            'description' => 'Développement d\'une application mobile pour les produits ISIM',
            'statut' => 'en_attente',
            'date_debut' => '2026-05-01',
            'user_id' => 1, // Assurez-vous que cet ID correspond à un utilisateur existant
        ]);
        Projet::create([
            'nom' => 'Système de Gestion ISIM',
            'description' => 'Développement d\'une application de gestion pour les produits ISIM',
            'statut' => 'termine',
            'date_debut' => '2025-01-22',
            'user_id' => 1, // Assurez-vous que cet ID correspond à un utilisateur existant
        ]);
    }
}

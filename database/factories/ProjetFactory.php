<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'statut' => fake()->randomElement(['en_attente', 'en_cours', 'termine']),
            'date_debut' => fake()->dateTimeBetween('-2 months', 'now'),
            'date_fin' => fake()->optional()->dateTimeBetween('now', '+3 months'),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

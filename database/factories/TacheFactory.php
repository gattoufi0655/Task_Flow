<?php

namespace Database\Factories;

use App\Models\Tache;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'statut' => fake()->randomElement(['todo', 'in_progress', 'done']),
            'priorite' => fake()->randomElement(['basse', 'moyenne', 'haute']),
            'date_echeance' => fake()->optional()->date(),
            // relation avec projet
            'projet_id' => Projet::factory(),
            // relation avec user (optionnel)
            'user_id' => fake()->optional()->randomElement(
                User::pluck('id')->toArray()
            ),
        ];
    }
}

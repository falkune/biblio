<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(),
            'isbn' => fake()->ean13(),
            'annee_de_sortie' => fake()->date(),
            'image' => fake()->imageUrl(),
            'auteur_id' => \App\Models\Auteur::factory()
        ];
    }
}

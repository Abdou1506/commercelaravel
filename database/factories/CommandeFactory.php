<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'libelle' => fake()->sentence(),
            'qte' => fake()->numberBetween($min=1,$max=10),
            'prix' => fake()->numberBetween($min=100,$max=900),
            'user_id' => fake()->numberBetween($min=1,$max=10),

            
        ];
    }
}

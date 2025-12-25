<?php

namespace Database\Factories;

use App\Models\PartijaGrozdja;
use Illuminate\Database\Eloquent\Factories\Factory;

class FermentacijaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'partija_grozdja_id' => PartijaGrozdja::factory(),
            'datum' => fake()->date(),
            'temperatura' => fake()->randomFloat(2, 0, 999.99),
            'secer' => fake()->randomFloat(2, 0, 999.99),
            'faza' => fake()->word(),
            'napomena' => fake()->text(),
        ];
    }
}

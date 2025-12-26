<?php

namespace Database\Factories;

use App\Models\Bure;
use App\Models\PartijaGrozdja;
use Illuminate\Database\Eloquent\Factories\Factory;

class VinoFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->word(),
            'tip' => fake()->word(),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'datum_proizvodnje' => fake()->date(),
            'partija_grozdja_id' => PartijaGrozdja::factory(),
            'bure_id' => Bure::factory(),
        ];
    }
}

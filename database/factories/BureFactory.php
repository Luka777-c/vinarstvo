<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BureFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'broj_bureta' => fake()->word(),
            'kapacitet' => fake()->numberBetween(-10000, 10000),
            'tip_drveta' => fake()->word(),
            'status' => fake()->randomElement(["prazno","puno","ciscenje"]),
            'napomena' => fake()->text(),
        ];
    }
}

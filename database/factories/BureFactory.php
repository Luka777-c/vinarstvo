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
            'broj_bureta' => 'BUR-' . $this->faker->unique()->numberBetween(100, 999),
            'kapacitet' => $this->faker->randomElement([225, 500, 1000, 2000]),
            'tip_drveta' => $this->faker->randomElement(['Hrast', 'Inox', 'Bagrem']),
            'status' => $this->faker->randomElement(['prazno', 'puno', 'ciscenje']),
            'napomena' => $this->faker->sentence(),
        ];
    }
}

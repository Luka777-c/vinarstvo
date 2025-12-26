<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartijaGrozdjaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sorta' => $this->faker->randomElement(['Vranac', 'Chardonnay', 'Merlot', 'Tamjanika', 'Cabernet Sauvignon']),
            'kolicina' => $this->faker->numberBetween(500, 5000),
            'status' => $this->faker->randomElement(['prijem', 'u_obradi', 'zavrseno']),
            'datum' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'napomena' => $this->faker->sentence(),
        ];
    }
}

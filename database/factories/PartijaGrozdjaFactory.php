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
            'sorta' => fake()->regexify('[A-Za-z0-9]{100}'),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'status' => fake()->randomElement(["prijem","u_obradi","zavrseno"]),
            'datum' => fake()->date(),
            'napomena' => fake()->text(),
        ];
    }
}

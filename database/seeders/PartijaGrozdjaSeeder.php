<?php

namespace Database\Seeders;

use App\Models\PartijaGrozdja;
use Illuminate\Database\Seeder;

class PartijaGrozdjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartijaGrozdja::factory()->count(5)->create();
    }
}

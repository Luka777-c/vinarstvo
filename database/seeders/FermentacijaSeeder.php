<?php

namespace Database\Seeders;

use App\Models\Fermentacija;
use Illuminate\Database\Seeder;

class FermentacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fermentacija::factory()->count(5)->create();
    }
}

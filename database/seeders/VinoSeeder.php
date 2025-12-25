<?php

namespace Database\Seeders;

use App\Models\Vino;
use Illuminate\Database\Seeder;

class VinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vino::factory()->count(5)->create();
    }
}

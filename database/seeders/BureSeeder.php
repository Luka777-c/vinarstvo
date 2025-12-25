<?php

namespace Database\Seeders;

use App\Models\Bure;
use Illuminate\Database\Seeder;

class BureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bure::factory()->count(5)->create();
    }
}

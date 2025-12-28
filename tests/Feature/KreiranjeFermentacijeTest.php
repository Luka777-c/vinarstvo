<?php

namespace Tests\Feature;

use App\Models\PartijaGrozdja;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class KreiranjeFermentacijeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function moze_se_uneti_zapis_fermentacije_za_partiju()
    {
        $user = User::factory()->create();

        $partija = PartijaGrozdja::factory()->create();

        $response = $this->actingAs($user)->post(route('fermentacija.store'), [
            'partija_grozdja_id' => $partija->id,
            'datum' => '2024-10-01',
            'temperatura' => 18.5,
            'secer' => 18,
            'faza' => 'Burno vrenje',
            'napomena' => 'Sve ok',
        ]);

        $this->assertDatabaseHas('fermentacijas', [
            'partija_grozdja_id' => $partija->id,
            'faza' => 'Burno vrenje',
        ]);
    }
}

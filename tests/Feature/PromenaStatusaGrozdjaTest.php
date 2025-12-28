<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\PartijaGrozdja;

class PromenaStatusaGrozdjaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function korisnik_moze_da_azurira_podatke_o_grozdju()
    {
        $user = User::factory()->create();

        $partija = PartijaGrozdja::factory()->create([
            'sorta' => 'Merlot',
            'napomena' => 'Stara napomena',
        ]);

        $noviPodaci = [
            'sorta' => 'Merlot',
            'kolicina' => $partija->kolicina,
            'datum' => $partija->datum,
            'napomena' => 'Nova ažurirana napomena!',
            'status' => 'u_obradi',
        ];

        $response = $this->actingAs($user)
                         ->put(route('partija-grozdja.update', $partija->id), $noviPodaci);

        $this->assertDatabaseHas('partija_grozdjas', [
            'id' => $partija->id,
            'napomena' => 'Nova ažurirana napomena!',
        ]);
        
        $this->assertDatabaseMissing('partija_grozdjas', [
            'id' => $partija->id,
            'napomena' => 'Stara napomena',
        ]);

        $this->assertDatabaseHas('partija_grozdjas', [
            'id' => $partija->id,
            'status' => 'u_obradi',
        ]);
    }
}
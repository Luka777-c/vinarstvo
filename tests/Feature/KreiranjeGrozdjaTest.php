<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class KreiranjeGrozdjaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function korisnik_moze_da_kreira_novu_partiju_grozdja()
    {
        // 1. Kreiramo korisnika da bismo se ulogovali
        $user = User::factory()->create();

        // 2. Podaci koje simuliramo da korisnik unosi u formu
        $podaci = [
            'sorta' => 'Chardonnay',
            'kolicina' => 2000,
            'datum' => '2024-09-15',
            'napomena' => 'Zdravo grožđe',
        ];

        // 3. Šaljemo podatke na čuvanje (kao da smo kliknuli Submit)
        $response = $this->actingAs($user)
                         ->post(route('partija-grozdja.store'), $podaci);

        // 4. Provera: Da li nas je vratilo na listu?
        $response->assertRedirect(route('partija-grozdja.index'));

        $this->assertDatabaseHas('partija_grozdjas', [
            'sorta' => 'Chardonnay',
            'kolicina' => 2000,
            'status' => 'prijem',
        ]);
    }
}

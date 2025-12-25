<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bure;
use App\Models\PartijaGrozdja;
use App\Models\Vino;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VinoController
 */
final class VinoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $vinos = Vino::factory()->count(3)->create();

        $response = $this->get(route('vinos.index'));

        $response->assertOk();
        $response->assertViewIs('vino.index');
        $response->assertViewHas('vinos', $vinos);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('vinos.create'));

        $response->assertOk();
        $response->assertViewIs('vino.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VinoController::class,
            'store',
            \App\Http\Requests\VinoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $naziv = fake()->word();
        $tip = fake()->word();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $datum_proizvodnje = Carbon::parse(fake()->date());
        $partija_grozdja = PartijaGrozdja::factory()->create();
        $bure = Bure::factory()->create();

        $response = $this->post(route('vinos.store'), [
            'naziv' => $naziv,
            'tip' => $tip,
            'kolicina' => $kolicina,
            'datum_proizvodnje' => $datum_proizvodnje->toDateString(),
            'partija_grozdja_id' => $partija_grozdja->id,
            'bure_id' => $bure->id,
        ]);

        $vinos = Vino::query()
            ->where('naziv', $naziv)
            ->where('tip', $tip)
            ->where('kolicina', $kolicina)
            ->where('datum_proizvodnje', $datum_proizvodnje)
            ->where('partija_grozdja_id', $partija_grozdja->id)
            ->where('bure_id', $bure->id)
            ->get();
        $this->assertCount(1, $vinos);
        $vino = $vinos->first();

        $response->assertRedirect(route('vinos.index'));
        $response->assertSessionHas('vino.id', $vino->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $vino = Vino::factory()->create();

        $response = $this->get(route('vinos.edit', $vino));

        $response->assertOk();
        $response->assertViewIs('vino.edit');
        $response->assertViewHas('vino', $vino);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VinoController::class,
            'update',
            \App\Http\Requests\VinoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $vino = Vino::factory()->create();
        $naziv = fake()->word();
        $tip = fake()->word();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $datum_proizvodnje = Carbon::parse(fake()->date());
        $partija_grozdja = PartijaGrozdja::factory()->create();
        $bure = Bure::factory()->create();

        $response = $this->put(route('vinos.update', $vino), [
            'naziv' => $naziv,
            'tip' => $tip,
            'kolicina' => $kolicina,
            'datum_proizvodnje' => $datum_proizvodnje->toDateString(),
            'partija_grozdja_id' => $partija_grozdja->id,
            'bure_id' => $bure->id,
        ]);

        $vino->refresh();

        $response->assertRedirect(route('vinos.index'));
        $response->assertSessionHas('vino.id', $vino->id);

        $this->assertEquals($naziv, $vino->naziv);
        $this->assertEquals($tip, $vino->tip);
        $this->assertEquals($kolicina, $vino->kolicina);
        $this->assertEquals($datum_proizvodnje, $vino->datum_proizvodnje);
        $this->assertEquals($partija_grozdja->id, $vino->partija_grozdja_id);
        $this->assertEquals($bure->id, $vino->bure_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $vino = Vino::factory()->create();

        $response = $this->delete(route('vinos.destroy', $vino));

        $response->assertRedirect(route('vinos.index'));

        $this->assertModelMissing($vino);
    }
}

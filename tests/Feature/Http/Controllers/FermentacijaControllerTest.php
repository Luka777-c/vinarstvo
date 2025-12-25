<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Fermentacija;
use App\Models\PartijaGrozdja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FermentacijaController
 */
final class FermentacijaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $fermentacijas = Fermentacija::factory()->count(3)->create();

        $response = $this->get(route('fermentacijas.index'));

        $response->assertOk();
        $response->assertViewIs('fermentacija.index');
        $response->assertViewHas('fermentacijas', $fermentacijas);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('fermentacijas.create'));

        $response->assertOk();
        $response->assertViewIs('fermentacija.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FermentacijaController::class,
            'store',
            \App\Http\Requests\FermentacijaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $partija_grozdja = PartijaGrozdja::factory()->create();
        $datum = Carbon::parse(fake()->date());
        $temperatura = fake()->randomFloat(/** decimal_attributes **/);
        $secer = fake()->randomFloat(/** decimal_attributes **/);
        $faza = fake()->word();

        $response = $this->post(route('fermentacijas.store'), [
            'partija_grozdja_id' => $partija_grozdja->id,
            'datum' => $datum->toDateString(),
            'temperatura' => $temperatura,
            'secer' => $secer,
            'faza' => $faza,
        ]);

        $fermentacijas = Fermentacija::query()
            ->where('partija_grozdja_id', $partija_grozdja->id)
            ->where('datum', $datum)
            ->where('temperatura', $temperatura)
            ->where('secer', $secer)
            ->where('faza', $faza)
            ->get();
        $this->assertCount(1, $fermentacijas);
        $fermentacija = $fermentacijas->first();

        $response->assertRedirect(route('fermentacijas.index'));
        $response->assertSessionHas('fermentacija.id', $fermentacija->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $fermentacija = Fermentacija::factory()->create();

        $response = $this->get(route('fermentacijas.edit', $fermentacija));

        $response->assertOk();
        $response->assertViewIs('fermentacija.edit');
        $response->assertViewHas('fermentacija', $fermentacija);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FermentacijaController::class,
            'update',
            \App\Http\Requests\FermentacijaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $fermentacija = Fermentacija::factory()->create();
        $partija_grozdja = PartijaGrozdja::factory()->create();
        $datum = Carbon::parse(fake()->date());
        $temperatura = fake()->randomFloat(/** decimal_attributes **/);
        $secer = fake()->randomFloat(/** decimal_attributes **/);
        $faza = fake()->word();

        $response = $this->put(route('fermentacijas.update', $fermentacija), [
            'partija_grozdja_id' => $partija_grozdja->id,
            'datum' => $datum->toDateString(),
            'temperatura' => $temperatura,
            'secer' => $secer,
            'faza' => $faza,
        ]);

        $fermentacija->refresh();

        $response->assertRedirect(route('fermentacijas.index'));
        $response->assertSessionHas('fermentacija.id', $fermentacija->id);

        $this->assertEquals($partija_grozdja->id, $fermentacija->partija_grozdja_id);
        $this->assertEquals($datum, $fermentacija->datum);
        $this->assertEquals($temperatura, $fermentacija->temperatura);
        $this->assertEquals($secer, $fermentacija->secer);
        $this->assertEquals($faza, $fermentacija->faza);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $fermentacija = Fermentacija::factory()->create();

        $response = $this->delete(route('fermentacijas.destroy', $fermentacija));

        $response->assertRedirect(route('fermentacijas.index'));

        $this->assertModelMissing($fermentacija);
    }
}

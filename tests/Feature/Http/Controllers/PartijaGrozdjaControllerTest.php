<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PartijaGrozdja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PartijaGrozdjaController
 */
final class PartijaGrozdjaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $partijaGrozdjas = PartijaGrozdja::factory()->count(3)->create();

        $response = $this->get(route('partija-grozdjas.index'));

        $response->assertOk();
        $response->assertViewIs('partijaGrozdja.index');
        $response->assertViewHas('partijaGrozdjas', $partijaGrozdjas);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('partija-grozdjas.create'));

        $response->assertOk();
        $response->assertViewIs('partijaGrozdja.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartijaGrozdjaController::class,
            'store',
            \App\Http\Requests\PartijaGrozdjaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $sorta = fake()->word();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $status = fake()->randomElement(/** enum_attributes **/);
        $datum = Carbon::parse(fake()->date());

        $response = $this->post(route('partija-grozdjas.store'), [
            'sorta' => $sorta,
            'kolicina' => $kolicina,
            'status' => $status,
            'datum' => $datum->toDateString(),
        ]);

        $partijaGrozdjas = PartijaGrozdja::query()
            ->where('sorta', $sorta)
            ->where('kolicina', $kolicina)
            ->where('status', $status)
            ->where('datum', $datum)
            ->get();
        $this->assertCount(1, $partijaGrozdjas);
        $partijaGrozdja = $partijaGrozdjas->first();

        $response->assertRedirect(route('partijaGrozdjas.index'));
        $response->assertSessionHas('partijaGrozdja.id', $partijaGrozdja->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $partijaGrozdja = PartijaGrozdja::factory()->create();

        $response = $this->get(route('partija-grozdjas.edit', $partijaGrozdja));

        $response->assertOk();
        $response->assertViewIs('partijaGrozdja.edit');
        $response->assertViewHas('partijaGrozdja', $partijaGrozdja);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartijaGrozdjaController::class,
            'update',
            \App\Http\Requests\PartijaGrozdjaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $partijaGrozdja = PartijaGrozdja::factory()->create();
        $sorta = fake()->word();
        $kolicina = fake()->numberBetween(-10000, 10000);
        $status = fake()->randomElement(/** enum_attributes **/);
        $datum = Carbon::parse(fake()->date());

        $response = $this->put(route('partija-grozdjas.update', $partijaGrozdja), [
            'sorta' => $sorta,
            'kolicina' => $kolicina,
            'status' => $status,
            'datum' => $datum->toDateString(),
        ]);

        $partijaGrozdja->refresh();

        $response->assertRedirect(route('partijaGrozdjas.index'));
        $response->assertSessionHas('partijaGrozdja.id', $partijaGrozdja->id);

        $this->assertEquals($sorta, $partijaGrozdja->sorta);
        $this->assertEquals($kolicina, $partijaGrozdja->kolicina);
        $this->assertEquals($status, $partijaGrozdja->status);
        $this->assertEquals($datum, $partijaGrozdja->datum);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $partijaGrozdja = PartijaGrozdja::factory()->create();

        $response = $this->delete(route('partija-grozdjas.destroy', $partijaGrozdja));

        $response->assertRedirect(route('partijaGrozdjas.index'));

        $this->assertModelMissing($partijaGrozdja);
    }
}

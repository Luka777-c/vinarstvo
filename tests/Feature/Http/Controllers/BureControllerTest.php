<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BureController
 */
final class BureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $bures = Bure::factory()->count(3)->create();

        $response = $this->get(route('bures.index'));

        $response->assertOk();
        $response->assertViewIs('bure.index');
        $response->assertViewHas('bures', $bures);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('bures.create'));

        $response->assertOk();
        $response->assertViewIs('bure.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BureController::class,
            'store',
            \App\Http\Requests\BureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $broj_bureta = fake()->word();
        $kapacitet = fake()->numberBetween(-10000, 10000);
        $tip_drveta = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('bures.store'), [
            'broj_bureta' => $broj_bureta,
            'kapacitet' => $kapacitet,
            'tip_drveta' => $tip_drveta,
            'status' => $status,
        ]);

        $bures = Bure::query()
            ->where('broj_bureta', $broj_bureta)
            ->where('kapacitet', $kapacitet)
            ->where('tip_drveta', $tip_drveta)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $bures);
        $bure = $bures->first();

        $response->assertRedirect(route('bures.index'));
        $response->assertSessionHas('bure.id', $bure->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $bure = Bure::factory()->create();

        $response = $this->get(route('bures.edit', $bure));

        $response->assertOk();
        $response->assertViewIs('bure.edit');
        $response->assertViewHas('bure', $bure);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BureController::class,
            'update',
            \App\Http\Requests\BureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $bure = Bure::factory()->create();
        $broj_bureta = fake()->word();
        $kapacitet = fake()->numberBetween(-10000, 10000);
        $tip_drveta = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('bures.update', $bure), [
            'broj_bureta' => $broj_bureta,
            'kapacitet' => $kapacitet,
            'tip_drveta' => $tip_drveta,
            'status' => $status,
        ]);

        $bure->refresh();

        $response->assertRedirect(route('bures.index'));
        $response->assertSessionHas('bure.id', $bure->id);

        $this->assertEquals($broj_bureta, $bure->broj_bureta);
        $this->assertEquals($kapacitet, $bure->kapacitet);
        $this->assertEquals($tip_drveta, $bure->tip_drveta);
        $this->assertEquals($status, $bure->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $bure = Bure::factory()->create();

        $response = $this->delete(route('bures.destroy', $bure));

        $response->assertRedirect(route('bures.index'));

        $this->assertModelMissing($bure);
    }
}

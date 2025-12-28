<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Bure;

class ValidacijaBuretaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function ne_moze_se_kreirati_bure_sa_postojecim_brojem()
    {
        $user = User::factory()->create();

        Bure::factory()->create(['broj_bureta' => 'B-001']);

        $response = $this->actingAs($user)->post(route('bure.store'), [
            'broj_bureta' => 'B-001',
            'kapacitet' => 500,
            'tip_drveta' => 'Hrast',
            'status' => 'prazno'
        ]);

        $response->assertSessionHasErrors('broj_bureta');
    }
}

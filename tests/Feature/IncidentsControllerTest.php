<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Incident;
use App\Models\Race;
use App\Models\Series;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidentsControllerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_submits_an_incident()
    {
        /** @var \App\Models\User */
        $user = User::factory()->create();
        $race = Race::factory()->create([
            'series_id' => Series::factory()->create()->id,
            'date' => now()->subDay(),
        ]);
        $response = $this->actingAs($user)->post(route('incidents.store'), [
            'race_id' => $race->id,
            'session_time' => $this->faker()->time('H:i'),
            'comment' => $this->faker()->sentence(),
        ])->assertOk();
        $race2 = Race::factory()->create([
            'series_id' => Series::factory()->create()->id,
            'date' => now()->subDay(3),
        ]);
        $response = $this->actingAs($user)->post(route('incidents.store'), [
            'race_id' => $race2->id,
            'session_time' => $this->faker()->time('H:i'),
            'comment' => $this->faker()->sentence(),
        ])->assertSessionHasErrors('race_id');
    }
}

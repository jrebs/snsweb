<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Race;
use App\Models\Series;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncidentsControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
        $series = Series::factory()->create();
        $driver = User::factory()->create();
        $series->drivers()->save($driver);

        // A test expected to succeed.
        $race = Race::factory()->create([
            'series_id' => Series::factory()->create()->id,
            'date' => now()->subDay(),
        ]);
        $this->actingAs($user)->post(route('incidents.store'), [
            'race_id' => $race->id,
            'session_time' => $this->faker()->time('H:i'),
            'comment' => $this->faker()->sentence(),
            'user_id' => $driver->id,
        ])->assertCreated();

        // It's been too long to file a protest.
        $race2 = Race::factory()->create([
            'series_id' => Series::factory()->create()->id,
            'date' => now()->subDay(3),
        ]);
        $this->actingAs($user)->post(route('incidents.store'), [
            'race_id' => $race2->id,
            'session_time' => $this->faker()->time('H:i'),
            'comment' => $this->faker()->sentence(),
            'user_id' => $driver->id,
        ])->assertSessionHasErrors('race_id');

        // The event hasn't happened yet.
        $race3 = Race::factory()->create([
            'series_id' => Series::factory()->create()->id,
            'date' => now()->addDay(),
        ]);
        $this->actingAs($user)->post(route('incidents.store'), [
            'race_id' => $race3->id,
            'session_time' => $this->faker()->time('H:i'),
            'comment' => $this->faker()->sentence(),
            'user_id' => $driver->id,
        ])->assertSessionHasErrors('race_id');
    }
}

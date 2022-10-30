<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Race;
use App\Models\Series;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_protestable_scope()
    {
        $series = Series::factory()->create();
        $valid = Race::factory()->make(['date' => now()->subHours(47)]);
        $expired = Race::factory()->make(['date' => now()->subHours(49),]);
        $pending = Race::factory()->make(['date' => now()->addHour(),]);
        $series->races()->saveMany([$expired, $valid, $pending]);
        $this->assertEquals(3, Race::count());
        $protestable = Race::protestable()->get();
        $this->assertEquals(1, $protestable->count());
        $this->assertContains($valid->id, $protestable->pluck('id'));
    }
}

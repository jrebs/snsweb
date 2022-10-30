<?php

namespace Database\Seeders;

use App\Models\Incident;
use App\Models\Race;
use App\Models\Result;
use App\Models\Series;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $numDrivers = 10;
        // Seed the DB with a bunch of data for testing. Assumes that the
        // main DatabaseSeeder has been run to load the user roles.
        $director = User::factory()->create();
        $director->assignRole('director');
        $series = Series::factory()->create();
        $series->directors()->save($director);
        $drivers = $series->drivers()->saveMany(User::factory($numDrivers)->make());
        /** @var \App\Models\Race */
        $race = Race::factory()->create([
            'series_id' => $series->id,
            'date' => now()->subHour(),
        ]);
        for ($i = 0; $i < $numDrivers; $i++) {
            Result::create([
                'race_id' => $race->id,
                'user_id' => $drivers[$i]->id,
                'start' => $i+1,
                'finish' => $faker->unique()->numberBetween(1, $numDrivers),
            ]);
        }
        $incident = $race->incidents()->saveMany(
            Incident::factory(1)->make([
                'user_id' => $race->results()->inRandomOrder()->first()->id
            ])
        )[0];
    }
}

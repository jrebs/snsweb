<?php

namespace Database\Seeders;

use App\Models\Race;
use App\Models\Series;
use App\Models\User;
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
        // Seed the DB with a bunch of data for testing. Assumes that the
        // main DatabaseSeeder has been run to load the user roles.
        $director = User::factory()->create();
        $director->assignRole('director');
        $sf1 = Series::factory()->create(['name' => 'SF1']);
        $sf1->directors()->save($director);
        $sf1->drivers()->saveMany(User::factory(3)->create());
        $sf1->races()->saveMany(Race::factory(2)->create([
            'series_id' => $sf1->id
        ]));
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole('admin');
        User::factory()->create([
            'name' => 'Director',
            'email' => 'director@example.com',
        ])->assignRole('director');
        User::factory()->create([
            'name' => 'Driver',
            'email' => 'driver@example.com',
        ])->assignRole('driver');
        User::factory()->create([
            'name' => 'Steward',
            'email' => 'steward@example.com',
        ])->assignRole('steward');
    }
}

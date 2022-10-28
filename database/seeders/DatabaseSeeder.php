<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(PermissionRegistrar $registrar)
    {
        $registrar->forgetCachedPermissions();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'director']);
        Role::create(['name' => 'driver']);
        Role::create(['name' => 'steward']);
    }
}

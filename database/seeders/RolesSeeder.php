<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(PermissionRegistrar $registrar)
    {
        $registrar->forgetCachedPermissions();
        Role::create(['name' => 'driver']);
        Role::create(['name' => 'steward']);
        Role::create(['name' => 'director']);
    }
}

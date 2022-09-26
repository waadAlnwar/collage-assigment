<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $all_permissions = Permission::all();
        $admin = Role::create(['name' => 'admin', 'description' => 'access everything.']);

        $admin->givePermissionTo($all_permissions);
    }
}

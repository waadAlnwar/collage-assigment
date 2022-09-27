<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Roles
        Permission::create(['name' => 'roles_access', 'label' => 'Roles access']);

        // Staff (Users)
        Permission::create(['name' => 'users_create', 'label' => 'Users create']);
        Permission::create(['name' => 'users_list', 'label' => 'Users list']);
        Permission::create(['name' => 'users_update', 'label' => 'Users update']);
        Permission::create(['name' => 'users_delete', 'label' => 'Users delete']);

        // certificates
        Permission::create(['name' => 'certificate_list', 'label' => 'certificate list']);
    }
}

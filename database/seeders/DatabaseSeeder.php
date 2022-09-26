<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Gender::create(['name' => 'male']);
        Gender::create(['name' => 'female']);

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StatusSeeder::class
        ]);
    }
}

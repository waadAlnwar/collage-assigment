<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'first_name' => "Super",
            'last_name' => "Admin",
            'email' => 'admin@admin.com',
            'phone' => 912345678,
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('admin');
        $admin->save();
    }
}

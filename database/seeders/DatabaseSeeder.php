<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Run roles and permissions first
        $this->call(RoleAndPermissionSeeder::class);

        // Create the default admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@leather.com'],
            [
                'name' => 'super admin',
                'password' => \Illuminate\Support\Facades\Hash::make('pale123'),
                'phone' => '0909090909',
                'role' => 'admin',
                'address' => 'addis abeba',
            ]
        );

        // Assign Spatie 'admin' role
        $admin->assignRole('admin');
    }
}


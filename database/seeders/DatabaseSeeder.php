<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@leather.com'],
            [
                'name' => 'super admin',
                'password' => \Illuminate\Support\Facades\Hash::make('pale123'),
                'phone' => '0909090909',
                'role' => 'admin',
                'address' => 'addis abeba',
            ]
        );
    }
}

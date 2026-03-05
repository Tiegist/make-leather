<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // --- User Permissions ---
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-update']);
        Permission::create(['name' => 'user-delete']);
        Permission::create(['name' => 'user-read']);

        // --- Category Permissions ---
        Permission::create(['name' => 'category-create']);
        Permission::create(['name' => 'category-update']);
        Permission::create(['name' => 'category-delete']);
        Permission::create(['name' => 'category-read']);

        // --- Product Permissions ---
        Permission::create(['name' => 'product-create']);
        Permission::create(['name' => 'product-update']);
        Permission::create(['name' => 'product-delete']);
        Permission::create(['name' => 'product-read']);

        // --- Product Image Permissions ---
        Permission::create(['name' => 'product-image-create']);
        Permission::create(['name' => 'product-image-update']);
        Permission::create(['name' => 'product-image-delete']);
        Permission::create(['name' => 'product-image-read']);

        // --- Roles ---
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all()); // Admin gets everything

        $guest = Role::create(['name' => 'guest']);
        $guest->givePermissionTo([
            'category-read',
            'product-read',
            'product-image-read',
        ]); // Guests can only read/browse
    }
}

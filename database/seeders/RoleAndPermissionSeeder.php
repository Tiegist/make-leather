<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
    
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    
        Permission::firstOrCreate(['name' => 'user-create']);
        Permission::firstOrCreate(['name' => 'user-update']);
        Permission::firstOrCreate(['name' => 'user-delete']);
        Permission::firstOrCreate(['name' => 'user-read']);

        Permission::firstOrCreate(['name' => 'category-create']);
        Permission::firstOrCreate(['name' => 'category-update']);
        Permission::firstOrCreate(['name' => 'category-delete']);
        Permission::firstOrCreate(['name' => 'category-read']);

  
        Permission::firstOrCreate(['name' => 'product-create']);
        Permission::firstOrCreate(['name' => 'product-update']);
        Permission::firstOrCreate(['name' => 'product-delete']);
        Permission::firstOrCreate(['name' => 'product-read']);

        
        Permission::firstOrCreate(['name' => 'product-image-create']);
        Permission::firstOrCreate(['name' => 'product-image-update']);
        Permission::firstOrCreate(['name' => 'product-image-delete']);
        Permission::firstOrCreate(['name' => 'product-image-read']);

       
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $guest = Role::firstOrCreate(['name' => 'guest']);
        $guest->givePermissionTo([
            'category-read',
            'product-read',
            'product-image-read',
        ]); 
    }
}

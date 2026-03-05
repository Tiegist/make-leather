<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call(RoleAndPermissionSeeder::class);

        $admin = User::updateOrCreate(
            ['email' => 'admin@makeleather.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin12345'),
                'phone' => '0909090909',
                'role' => 'admin',
                'address' => 'Addis Abeba',
            ]
        );
        $admin->assignRole('admin');

        $legacy = User::updateOrCreate(
            ['email' => 'admin@leather.com'],
            [
                'name' => 'Legacy Admin',
                'password' => Hash::make('pale123'),
                'role' => 'admin',
            ]
        );
        $legacy->assignRole('admin');

        $cats = [
            ['name' => 'Leather Shoes', 'slug' => 'leather-shoes'],
            ['name' => 'Leather Bags', 'slug' => 'leather-bags'],
            ['name' => 'Leather Belts', 'slug' => 'leather-belts'],
            ['name' => 'Leather Wallets', 'slug' => 'leather-wallets'],
            ['name' => 'Leather Accessories', 'slug' => 'leather-accessories'],
        ];

        foreach ($cats as $c) {
            Category::firstOrCreate(
                ['slug' => $c['slug']],
                ['name' => $c['name'], 'description' => null, 'is_active' => true]
            );
        }

        $ensureProduct = function (string $name, string $categorySlug, float $price, ?string $mainImage = null) {
            $category = Category::where('slug', $categorySlug)->first();
            $slugBase = Str::slug($name);
            $slug = $slugBase;
            $i = 2;
            while (Product::where('slug', $slug)->exists()) {
                $slug = "{$slugBase}-{$i}";
                $i++;
            }

            Product::firstOrCreate(
                ['name' => $name],
                [
                    'category_id' => $category?->id,
                    'slug' => $slug,
                    'description' => 'Premium leather product with refined finishing and durability.',
                    'price' => $price,
                    'stock' => 0,
                    'main_image' => $mainImage,
                    'is_featured' => true,
                    'is_active' => true,
                ]
            );
        };

        $ensureProduct('Classic Oxford Shoes', 'leather-shoes', 189, '/images/products/shoes-01.svg');
        $ensureProduct('Weekender Travel Bag', 'leather-bags', 260, '/images/products/bag-01.svg');
        $ensureProduct('Heritage Leather Belt', 'leather-belts', 75, '/images/products/belt-01.svg');
        $ensureProduct('Slim Bifold Wallet', 'leather-wallets', 65, '/images/products/wallet-01.svg');
    }
}


<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Kasir
        User::create([
            'username' => 'kasir',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        // Categories
        $categories = [
            ['name' => 'Lauk Pauk'],
            ['name' => 'Sayuran'],
            ['name' => 'Minuman'],
            ['name' => 'Paket'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create($cat);

            // Menus for each category
            if ($cat['name'] == 'Lauk Pauk') {
                $menus = [
                    ['name' => 'Rendang Daging', 'price' => 25000],
                    ['name' => 'Ayam Pop', 'price' => 20000],
                    ['name' => 'Ikan Bakar', 'price' => 22000],
                ];
            } elseif ($cat['name'] == 'Sayuran') {
                $menus = [
                    ['name' => 'Daun Singkong', 'price' => 5000],
                    ['name' => 'Gulai Nangka', 'price' => 7000],
                ];
            } elseif ($cat['name'] == 'Minuman') {
                $menus = [
                    ['name' => 'Es Teh Manis', 'price' => 5000],
                    ['name' => 'Es Jeruk', 'price' => 7000],
                ];
            } else {
                $menus = [
                    ['name' => 'Paket Hemat', 'price' => 35000],
                ];
            }

            foreach ($menus as $m) {
                $menu = Menu::create([
                    'category_id' => $category->id,
                    'name' => $m['name'],
                    'price' => $m['price'],
                ]);

                // Initial Stock
                Stock::create([
                    'menu_id' => $menu->id,
                    'quantity' => rand(20, 100),
                ]);
            }
        }
    }
}

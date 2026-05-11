<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'kasir1',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        User::create([
            'username' => 'kasir2',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        // 2. Categories
        $categories = [
            ['name' => 'Lauk Ayam'],
            ['name' => 'Lauk Daging'],
            ['name' => 'Lauk Ikan'],
            ['name' => 'Sayuran'],
            ['name' => 'Minuman'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 3. Menus & Initial Stocks
        $menus = [
            // Ayam
            ['category_id' => 1, 'name' => 'Ayam Pop', 'price' => 18000, 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500&auto=format&fit=crop', 'stock' => 30],
            ['category_id' => 1, 'name' => 'Ayam Gulai', 'price' => 17000, 'image' => 'https://www.dapurkobe.co.id/wp-content/uploads/gulai-padang.jpg', 'stock' => 45],
            ['category_id' => 1, 'name' => 'Ayam Bakar', 'price' => 17000, 'image' => 'https://i0.wp.com/icone-inc.org/wp-content/uploads/2020/02/Nasi-Ayam-Bakar-Padang-dian.jpg?fit=400%2C283&ssl=1', 'stock' => 40],
            
            // Daging
            ['category_id' => 2, 'name' => 'Rendang Daging', 'price' => 20000, 'image' => 'https://www.frisianflag.com/storage/app/media/uploaded-files/rendang-padang.jpg', 'stock' => 50],
            ['category_id' => 2, 'name' => 'Dendeng Batokok', 'price' => 19000, 'image' => 'https://asset.kompas.com/crops/sOuyO86K4EXjTCRmHWBd4caSFKc=/38x72:838x605/1200x800/data/photo/2022/04/02/6247cfd4495ba.jpg', 'stock' => 35],
            ['category_id' => 2, 'name' => 'Gulai Tunjang', 'price' => 22000, 'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=500&auto=format&fit=crop', 'stock' => 25],
            
            // Ikan
            ['category_id' => 3, 'name' => 'Ikan Bilih Goreng', 'price' => 15000, 'image' => 'https://images.unsplash.com/photo-1544025162-811114215b49?q=80&w=500&auto=format&fit=crop', 'stock' => 60],
            ['category_id' => 3, 'name' => 'Gulai Kepala Kakap', 'price' => 45000, 'image' => 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?q=80&w=500&auto=format&fit=crop', 'stock' => 15],
            
            // Sayur
            ['category_id' => 4, 'name' => 'Sayur Nangka', 'price' => 8000, 'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=500&auto=format&fit=crop', 'stock' => 100],
            ['category_id' => 4, 'name' => 'Daun Singkong', 'price' => 5000, 'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=500&auto=format&fit=crop', 'stock' => 100],
            
            // Minuman
            ['category_id' => 5, 'name' => 'Teh Talua', 'price' => 12000, 'image' => 'https://images.unsplash.com/photo-1556881286-fc6915169721?q=80&w=500&auto=format&fit=crop', 'stock' => 40],
            ['category_id' => 5, 'name' => 'Es Jeruk Peras', 'price' => 10000, 'image' => 'https://images.unsplash.com/photo-1613478223719-2ab802602423?q=80&w=500&auto=format&fit=crop', 'stock' => 50],
            ['category_id' => 5, 'name' => 'Es Teh Manis', 'price' => 5000, 'image' => 'https://images.unsplash.com/photo-1499638673689-79a0b5115d87?q=80&w=500&auto=format&fit=crop', 'stock' => 200],
        ];

        $createdMenus = [];
        foreach ($menus as $m) {
            $stockQty = $m['stock'];
            unset($m['stock']);
            $menu = Menu::create($m);
            $menu->stock()->create(['quantity' => $stockQty]);
            $createdMenus[] = $menu;
        }

        // 4. Simulated 30-Day Transactions
        $kasirIds = User::where('role', 'kasir')->pluck('id')->toArray();
        $startDate = Carbon::now()->subDays(30);

        for ($i = 0; $i <= 30; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            
            // 5-15 transactions per day
            $dailyTxCount = rand(8, 20);

            for ($j = 0; $j < $dailyTxCount; $j++) {
                $status = (rand(1, 10) > 1) ? 'success' : 'cancelled'; // 10% cancellation rate
                $totalPrice = 0;
                
                $transaction = Transaction::create([
                    'user_id' => $kasirIds[array_rand($kasirIds)],
                    'total_price' => 0, // Update later
                    'status' => $status,
                    'created_at' => $currentDate->copy()->addHours(rand(10, 21))->addMinutes(rand(0, 59)),
                ]);

                // 2-5 items per transaction
                $itemCount = rand(2, 6);
                $selectedMenus = [];

                for ($k = 0; $k < $itemCount; $k++) {
                    // Trend simulation: Rendang (ID 4) and Ayam Pop (ID 1) appear more often
                    $rand = rand(1, 100);
                    if ($rand <= 25) {
                        $menu = $createdMenus[3]; // Rendang Daging
                    } elseif ($rand <= 45) {
                        $menu = $createdMenus[0]; // Ayam Pop
                    } else {
                        $menu = $createdMenus[array_rand($createdMenus)];
                    }

                    if (in_array($menu->id, $selectedMenus)) continue;
                    $selectedMenus[] = $menu->id;

                    $qty = rand(1, 3);
                    $subtotal = $menu->price * $qty;
                    $totalPrice += $subtotal;

                    TransactionDetail::create([
                        'transaction_id' => $transaction->id,
                        'menu_id' => $menu->id,
                        'quantity' => $qty,
                        'price' => $menu->price,
                        'created_at' => $transaction->created_at,
                    ]);
                }

                $transaction->update(['total_price' => $totalPrice]);
            }
        }
    }
}

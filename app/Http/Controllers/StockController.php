<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category', 'stock')->get();
        $lowStockMenus = Menu::whereHas('stock', function($q) {
            $q->where('quantity', '<', 10);
        })->with('stock')->get();

        return view('stok_barang', compact('menus', 'lowStockMenus'));
    }
}

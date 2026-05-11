<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category', 'stock')->get();
        $categories = Category::all();
        return view('pendataan_barang', compact('menus', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|url'
        ]);

        $menu = Menu::create($request->only(['name', 'category_id', 'price', 'image']));
        
        $menu->stock()->create([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|url'
        ]);

        $menu->update($request->only(['name', 'category_id', 'price', 'image']));
        $menu->stock->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus!');
    }
}

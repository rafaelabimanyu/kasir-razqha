<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Store a newly created transaction.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {
            $totalPrice = 0;
            $itemsToProcess = [];

            foreach ($request->items as $item) {
                $menu = Menu::findOrFail($item['menu_id']);
                $stock = Stock::where('menu_id', $menu->id)->first();

                if (!$stock || $stock->quantity < $item['quantity']) {
                    return response()->json([
                        'success' => false,
                        'message' => "Stok untuk {$menu->name} tidak mencukupi."
                    ], 422);
                }

                $totalPrice += $menu->price * $item['quantity'];
                $itemsToProcess[] = [
                    'menu_id' => $menu->id,
                    'quantity' => $item['quantity'],
                    'price' => $menu->price
                ];
            }

            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'status' => 'success'
            ]);

            $details = [];
            foreach ($itemsToProcess as $item) {
                $detail = $transaction->details()->create($item);
                $details[] = [
                    'name' => Menu::find($item['menu_id'])->name,
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil diproses.',
                'data' => [
                    'transaction_id' => $transaction->id,
                    'total' => $totalPrice,
                    'items' => $details,
                    'time' => $transaction->created_at->format('d M Y H:i')
                ]
            ]);
        });
    }

    /**
     * Display the transaction page (Advanced POS).
     */
    public function index()
    {
        $menus = Menu::with('category', 'stock')->get();
        $categories = \App\Models\Category::all();
        return view('transaksi_kasir', compact('menus', 'categories'));
    }

    /**
     * Display transaction history for the logged in user.
     */
    public function history()
    {
        $transactions = Transaction::with(['details.menu'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('riwayat_transaksi', compact('transactions'));
    }
}

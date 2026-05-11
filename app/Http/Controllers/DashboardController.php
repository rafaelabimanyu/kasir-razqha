<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Stats
        $totalMenu = Menu::count();
        $totalStock = Stock::sum('quantity');
        $totalTransactions = Transaction::where('status', 'success')->count();
        
        // Revenue calculations
        $revenue = $this->getRevenueData();

        // Best Selling Menu
        $bestSelling = Menu::bestSelling()->take(5)->get();

        // Recent Transactions
        $recentTransactions = Transaction::with(['user', 'details.menu'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Stock Alerts
        $lowStockItems = Stock::with('menu')
            ->where('quantity', '<', 10)
            ->get();

        return view('dashboard', compact(
            'totalMenu', 
            'totalStock', 
            'totalTransactions', 
            'revenue',
            'bestSelling',
            'recentTransactions',
            'lowStockItems'
        ));
    }

    private function getRevenueData()
    {
        $today = Transaction::whereDate('created_at', Carbon::today())->where('status', 'success')->sum('total_price');
        $thisWeek = Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'success')->sum('total_price');
        $thisMonth = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', 'success')->sum('total_price');
        
        // Data for Sparklines (daily revenue for the last 7 days)
        $sparklineData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $sparklineData[] = Transaction::whereDate('created_at', $date)->where('status', 'success')->sum('total_price');
        }

        return [
            'today' => $today,
            'this_week' => $thisWeek,
            'this_month' => $thisMonth,
            'sparkline' => $sparklineData
        ];
    }

    /**
     * API for real-time polling
     */
    public function getStats()
    {
        return response()->json([
            'totalMenu' => Menu::count(),
            'totalStock' => Stock::sum('quantity'),
            'totalTransactions' => Transaction::where('status', 'success')->count(),
            'revenue' => $this->getRevenueData(),
            'recentTransactions' => Transaction::with(['user', 'details.menu'])
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(),
        ]);
    }
}

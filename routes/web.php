<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/api/stats', [DashboardController::class, 'getStats']);
        Route::get('/admin/guide', [\App\Http\Controllers\GuideController::class, 'admin'])->name('admin.guide');
        
        Route::get('/registrasi-petugas', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::post('/registrasi-petugas', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::put('/registrasi-petugas/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::delete('/registrasi-petugas/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/pendataan-barang', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
        Route::post('/pendataan-barang', [\App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
        Route::put('/pendataan-barang/{menu}', [\App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
        Route::delete('/pendataan-barang/{menu}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');

        Route::get('/stok-barang', [\App\Http\Controllers\StockController::class, 'index'])->name('stock.index');
    });

    // Kasir Routes
    Route::middleware(['role:kasir,admin'])->group(function () {
        Route::get('/dashboard-kasir', function () {
            return view('dashboard_kasir');
        });

        Route::get('/transaksi-kasir', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaksi.index');
        Route::get('/riwayat-transaksi', [\App\Http\Controllers\TransactionController::class, 'history'])->name('transaksi.history');
        Route::get('/kasir/guide', [\App\Http\Controllers\GuideController::class, 'kasir'])->name('kasir.guide');
        Route::post('/api/transactions', [\App\Http\Controllers\TransactionController::class, 'store']);

        Route::get('/stok-barang-kasir', function () {
            return view('stok_barang_kasir');
        });
    });
});
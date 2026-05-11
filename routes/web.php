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
        
        Route::get('/registrasi-petugas', function () {
            return view('registrasi_petugas');
        });

        Route::get('/pendataan-barang', function () {
            return view('pendataan_barang');
        });

        Route::get('/stok-barang', function () {
            return view('stok_barang');
        });
    });

    // Kasir Routes
    Route::middleware(['role:kasir,admin'])->group(function () {
        Route::get('/dashboard-kasir', function () {
            return view('dashboard_kasir');
        });

        Route::get('/transaksi-kasir', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaksi.index');
        Route::post('/api/transactions', [\App\Http\Controllers\TransactionController::class, 'store']);

        Route::get('/stok-barang-kasir', function () {
            return view('stok_barang_kasir');
        });
    });
});
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

use Illuminate\Http\Request;

Route::post('/login', function (Request $request) {
    if ($request->input('role') === 'kasir') {
        return redirect('/dashboard-kasir');
    }
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard-kasir', function () {
    return view('dashboard_kasir');
});

Route::get('/registrasi-petugas', function () {
    return view('registrasi_petugas');
});

Route::get('/pendataan-barang', function () {
    return view('pendataan_barang');
});

Route::get('/stok-barang', function () {
    return view('stok_barang');
});

Route::get('/transaksi-kasir', function () {
    return view('transaksi_kasir');
});

Route::get('/stok-barang-kasir', function () {
    return view('stok_barang_kasir');
});
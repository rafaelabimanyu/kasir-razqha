@extends('layouts.app')

@section('content')

<section class="hero">
    <div>
        <h2>Makanan Khas Padang</h2>
        <p>Nikmati cita rasa autentik Minangkabau</p>
        <button>Pesan Sekarang</button>
    </div>
</section>

<section class="menu">
    <h2>Menu Favorit</h2>

    <div class="menu-list">
        <div class="card">
            <img src="/images/rendang.jpg">
            <h3>Rendang</h3>
            <p>Rp 25.000</p>
        </div>

        <div class="card">
            <img src="/images/ayam.jpg">
            <h3>Ayam Pop</h3>
            <p>Rp 20.000</p>
        </div>

        <div class="card">
            <img src="/images/dendeng.jpg">
            <h3>Dendeng</h3>
            <p>Rp 30.000</p>
        </div>
    </div>
</section>

@endsection
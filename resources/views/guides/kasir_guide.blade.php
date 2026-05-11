@extends('layouts.admin')

@section('title', 'Pusat Bantuan Kasir')
@section('page_title', 'Panduan Operasional Kasir')

@section('content')
<div class="max-w-4xl mx-auto space-y-12 pb-20">
    
    <!-- Hero Section -->
    <div class="bg-brand-maroon rounded-[48px] p-12 text-white relative overflow-hidden">
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-4xl font-black mb-4 tracking-tight">Selamat Melayani Pelanggan!</h2>
            <p class="text-white/70 leading-relaxed font-medium">Ikuti panduan singkat ini untuk menguasai sistem kasir dalam waktu kurang dari 5 menit.</p>
        </div>
        <i class="ph ph-hand-waving absolute bottom-8 right-12 text-9xl text-white/5 font-bold"></i>
    </div>

    <!-- Steps Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Step 1 -->
        <div class="bg-white p-10 rounded-[40px] shadow-soft border border-gray-50 flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-brand-gold/10 rounded-[24px] flex items-center justify-center text-brand-gold mb-6">
                <i class="ph ph-magnifying-glass text-3xl font-bold"></i>
            </div>
            <h4 class="text-xl font-black text-gray-800 mb-3 uppercase tracking-tight">1. Cari Menu</h4>
            <p class="text-sm text-gray-400 leading-relaxed">Gunakan kolom pencarian atau klik kategori di atas untuk menemukan menu masakan Padang pilihan pelanggan.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white p-10 rounded-[40px] shadow-soft border border-gray-50 flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-brand-gold/10 rounded-[24px] flex items-center justify-center text-brand-gold mb-6">
                <i class="ph ph-shopping-cart text-3xl font-bold"></i>
            </div>
            <h4 class="text-xl font-black text-gray-800 mb-3 uppercase tracking-tight">2. Isi Keranjang</h4>
            <p class="text-sm text-gray-400 leading-relaxed">Klik pada menu untuk menambahkannya. Atur jumlah porsi menggunakan tombol + dan - di sisi kanan.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white p-10 rounded-[40px] shadow-soft border border-gray-50 flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-brand-gold/10 rounded-[24px] flex items-center justify-center text-brand-gold mb-6">
                <i class="ph ph-credit-card text-3xl font-bold"></i>
            </div>
            <h4 class="text-xl font-black text-gray-800 mb-3 uppercase tracking-tight">3. Pembayaran</h4>
            <p class="text-sm text-gray-400 leading-relaxed">Tekan tombol emas "BAYAR SEKARANG". Pastikan total uang yang diterima sudah sesuai dengan yang tertera.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white p-10 rounded-[40px] shadow-soft border border-gray-50 flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-brand-gold/10 rounded-[24px] flex items-center justify-center text-brand-gold mb-6">
                <i class="ph ph-printer text-3xl font-bold"></i>
            </div>
            <h4 class="text-xl font-black text-gray-800 mb-3 uppercase tracking-tight">4. Cetak Struk</h4>
            <p class="text-sm text-gray-400 leading-relaxed">Setelah sukses, notifikasi akan muncul. Klik "Cetak Struk" untuk memberikan bukti pembayaran kepada pelanggan.</p>
        </div>
    </div>

    <!-- Cheat Sheet / Shortcuts -->
    <div class="bg-brand-offwhite p-10 rounded-[40px] border border-gray-100">
        <div class="flex items-center gap-3 mb-8">
            <i class="ph ph-lightning text-2xl text-brand-maroon font-bold"></i>
            <h3 class="text-xl font-black text-brand-maroon tracking-tight">Tips Cepat (Cheat Sheet)</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-5 rounded-2xl flex justify-between items-center shadow-sm">
                <span class="text-sm font-bold text-gray-600">Batal Seluruh Pesanan</span>
                <span class="px-3 py-1 bg-gray-100 rounded-lg text-[10px] font-black text-gray-400">IKON TEMPAT SAMPAH</span>
            </div>
            <div class="bg-white p-5 rounded-2xl flex justify-between items-center shadow-sm">
                <span class="text-sm font-bold text-gray-600">Cek History Hari Ini</span>
                <span class="px-3 py-1 bg-gray-100 rounded-lg text-[10px] font-black text-gray-400">MENU RIWAYAT</span>
            </div>
            <div class="bg-white p-5 rounded-2xl flex justify-between items-center shadow-sm">
                <span class="text-sm font-bold text-gray-600">Ganti Akun / Shift</span>
                <span class="px-3 py-1 bg-gray-100 rounded-lg text-[10px] font-black text-gray-400">MENU KELUAR</span>
            </div>
            <div class="bg-white p-5 rounded-2xl flex justify-between items-center shadow-sm">
                <span class="text-sm font-bold text-gray-600">Hubungi Bantuan</span>
                <span class="px-3 py-1 bg-gray-100 rounded-lg text-[10px] font-black text-gray-400">MENU PANDUAN</span>
            </div>
        </div>
    </div>

    <div class="text-center opacity-40">
        <p class="text-xs font-bold tracking-widest uppercase">Versi Aplikasi 2.0 • Rumah Makan Padang Professional POS</p>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Pusat Bantuan Admin')
@section('page_title', 'Panduan Administrator')

@section('content')
<div x-data="{ activeTab: 'stok' }" class="flex flex-col lg:flex-row gap-8">
    
    <!-- Sidebar Tabs -->
    <div class="w-full lg:w-72 flex flex-col gap-2">
        <button 
            @click="activeTab = 'stok'"
            :class="activeTab === 'stok' ? 'bg-brand-maroon text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-50'"
            class="flex items-center gap-3 px-6 py-4 rounded-2xl font-bold text-sm transition-all text-left"
        >
            <i class="ph ph-stack text-xl"></i>
            Manajemen Stok
        </button>
        <button 
            @click="activeTab = 'menu'"
            :class="activeTab === 'menu' ? 'bg-brand-maroon text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-50'"
            class="flex items-center gap-3 px-6 py-4 rounded-2xl font-bold text-sm transition-all text-left"
        >
            <i class="ph ph-bowl-food text-xl"></i>
            Manajemen Menu
        </button>
        <button 
            @click="activeTab = 'petugas'"
            :class="activeTab === 'petugas' ? 'bg-brand-maroon text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-50'"
            class="flex items-center gap-3 px-6 py-4 rounded-2xl font-bold text-sm transition-all text-left"
        >
            <i class="ph ph-users-three text-xl"></i>
            Pendaftaran Petugas
        </button>
        <button 
            @click="activeTab = 'laporan'"
            :class="activeTab === 'laporan' ? 'bg-brand-maroon text-white shadow-lg' : 'bg-white text-gray-500 hover:bg-gray-50'"
            class="flex items-center gap-3 px-6 py-4 rounded-2xl font-bold text-sm transition-all text-left"
        >
            <i class="ph ph-chart-line-up text-xl"></i>
            Analisis Laporan
        </button>
    </div>

    <!-- Content Area -->
    <div class="flex-1 bg-white rounded-[40px] shadow-soft border border-gray-50 overflow-hidden">
        
        <!-- Stok Guide -->
        <div x-show="activeTab === 'stok'" x-transition class="p-10 space-y-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 bg-brand-gold/10 rounded-2xl flex items-center justify-center text-brand-gold">
                    <i class="ph-fill ph-stack text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black text-brand-maroon tracking-tight">Manajemen Stok Barang</h3>
            </div>
            
            <div class="space-y-6">
                <div class="flex gap-6 p-6 rounded-[24px] bg-gray-50 border border-gray-100">
                    <span class="flex-shrink-0 w-8 h-8 bg-brand-maroon text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2">Pantau Peringatan Kritis</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Cek kotak peringatan merah di halaman Stok. Menu dengan stok di bawah 10 porsi akan muncul di sana secara otomatis.</p>
                    </div>
                </div>
                
                <div class="flex gap-6 p-6 rounded-[24px] bg-gray-50 border border-gray-100">
                    <span class="flex-shrink-0 w-8 h-8 bg-brand-maroon text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2">Analisis Progress Bar</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Warna <span class="text-red-500 font-bold">Merah</span> berarti stok kritis, <span class="text-brand-gold font-bold">Emas</span> berarti menipis, dan <span class="text-green-500 font-bold">Hijau</span> berarti aman.</p>
                    </div>
                </div>

                <div class="bg-brand-maroon/5 p-6 rounded-[24px] border border-brand-maroon/10">
                    <h5 class="text-brand-maroon font-bold text-xs uppercase tracking-widest mb-3 flex items-center gap-2">
                        <i class="ph ph-info font-bold"></i>
                        Penting
                    </h5>
                    <p class="text-sm text-brand-maroon/80 font-medium">Pengurangan stok terjadi secara otomatis setiap kali kasir menekan tombol "Bayar". Anda tidak perlu melakukan input manual untuk penjualan.</p>
                </div>
            </div>
        </div>

        <!-- Menu Guide -->
        <div x-show="activeTab === 'menu'" x-transition class="p-10 space-y-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 bg-brand-gold/10 rounded-2xl flex items-center justify-center text-brand-gold">
                    <i class="ph-fill ph-bowl-food text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black text-brand-maroon tracking-tight">Manajemen Menu & Kategori</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 rounded-[24px] border border-gray-100">
                    <i class="ph ph-plus-circle text-3xl text-brand-maroon mb-4"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Tambah Menu</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Klik tombol emas di pojok kanan atas, masukkan URL foto makanan yang menarik untuk meningkatkan minat pelanggan.</p>
                </div>
                <div class="p-6 rounded-[24px] border border-gray-100">
                    <i class="ph ph-pencil-simple text-3xl text-brand-maroon mb-4"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Edit Harga</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Gunakan ikon pensil pada kartu menu. Perubahan harga akan langsung diterapkan di halaman POS Kasir.</p>
                </div>
            </div>
        </div>

        <!-- Petugas Guide -->
        <div x-show="activeTab === 'petugas'" x-transition class="p-10 space-y-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 bg-brand-gold/10 rounded-2xl flex items-center justify-center text-brand-gold">
                    <i class="ph-fill ph-users-three text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black text-brand-maroon tracking-tight">Pendaftaran Petugas Baru</h3>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-[32px] space-y-6">
                <div class="flex items-start gap-4">
                    <i class="ph ph-shield-check text-2xl text-green-500 mt-1"></i>
                    <div>
                        <h5 class="font-bold text-gray-800">Gunakan Role 'Kasir'</h5>
                        <p class="text-sm text-gray-500">Selalu berikan akses Kasir untuk staf operasional. Role Admin hanya untuk Anda sendiri.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <i class="ph ph-key text-2xl text-brand-gold mt-1"></i>
                    <div>
                        <h5 class="font-bold text-gray-800">Keamanan Akun</h5>
                        <p class="text-sm text-gray-500">Minta petugas untuk mengganti password secara berkala untuk menjaga keamanan data transaksi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Guide -->
        <div x-show="activeTab === 'laporan'" x-transition class="p-10 space-y-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 bg-brand-gold/10 rounded-2xl flex items-center justify-center text-brand-gold">
                    <i class="ph-fill ph-chart-line-up text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black text-brand-maroon tracking-tight">Analisis Laporan & Riwayat</h3>
            </div>
            
            <p class="text-gray-500 leading-relaxed">Halaman Dashboard menyediakan rangkuman otomatis. Untuk detail per transaksi, gunakan menu <strong>Riwayat</strong> di sidebar.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-brand-maroon text-white rounded-2xl">
                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-60">Status Selesai</span>
                    <p class="text-xs mt-1">Transaksi sah dan stok telah berkurang.</p>
                </div>
                <div class="p-4 bg-gray-100 text-gray-500 rounded-2xl">
                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-60">Status Batal</span>
                    <p class="text-xs mt-1">Transaksi tidak masuk ke total pendapatan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

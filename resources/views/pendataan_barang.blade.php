@extends('layouts.admin')

@section('title', 'Pendataan Menu')
@section('page_title', 'Manajemen Menu & Kategori')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div class="flex gap-4">
        <div class="relative group">
            <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Cari menu..." class="pl-12 pr-4 py-3 bg-white border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon transition-all text-sm w-64 shadow-sm">
        </div>
        <select class="px-4 py-3 bg-white border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon transition-all text-sm shadow-sm cursor-pointer">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <button @click="$dispatch('open-modal', 'modal-add-menu')" class="flex items-center gap-2 px-6 py-3 bg-brand-maroon text-white font-bold rounded-2xl shadow-lg hover:bg-brand-maroon-light transition-all">
        <i class="ph ph-plus-circle text-xl"></i>
        <span>Tambah Menu Baru</span>
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach($menus as $menu)
    <div class="bg-white rounded-[32px] overflow-hidden shadow-soft group hover:translate-y-[-8px] transition-all duration-300">
        <div class="h-48 overflow-hidden relative">
            <img src="{{ $menu->image ?? 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=500&auto=format&fit=crop' }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
            
            <div class="absolute top-4 right-4 flex gap-2">
                <button @click="$dispatch('open-modal', { id: 'modal-edit-menu', menu: {{ $menu->toJson() }} })" class="w-10 h-10 bg-white/90 backdrop-blur rounded-xl flex items-center justify-center text-blue-500 shadow-sm hover:bg-blue-500 hover:text-white transition-all">
                    <i class="ph ph-pencil-simple text-xl"></i>
                </button>
                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-white/90 backdrop-blur rounded-xl flex items-center justify-center text-red-500 shadow-sm hover:bg-red-500 hover:text-white transition-all">
                        <i class="ph ph-trash text-xl"></i>
                    </button>
                </form>
            </div>
            <div class="absolute bottom-4 left-4">
                <span class="px-3 py-1 bg-brand-gold text-brand-maroon text-[10px] font-bold rounded-full uppercase tracking-wider shadow-sm">
                    {{ $menu->category->name }}
                </span>
            </div>
        </div>
        <div class="p-6">
            <h4 class="font-bold text-gray-800 text-lg mb-4 truncate">{{ $menu->name }}</h4>
            
            <div class="flex justify-between items-end">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Harga</p>
                    <p class="text-brand-maroon font-black text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                </div>
                <div class="text-right space-y-1">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Stok</p>
                    <p class="font-bold {{ $menu->stock->quantity < 10 ? 'text-red-500' : 'text-brand-gold' }}">{{ $menu->stock->quantity }} Porsi</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Tambah Menu -->
<div 
    x-data="{ open: false }" 
    x-show="open" 
    @open-modal.window="if ($event.detail === 'modal-add-menu') open = true"
    class="fixed inset-0 z-[100] flex items-center justify-center p-6"
    x-cloak
>
    <div @click="open = false" class="absolute inset-0 bg-brand-maroon/20 backdrop-blur-sm"></div>
    <div class="bg-white w-full max-w-lg rounded-[40px] shadow-2xl relative z-10 overflow-hidden animate-in fade-in zoom-in duration-300">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-2xl text-brand-maroon">Tambah Menu</h3>
            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="ph ph-x-circle text-3xl"></i>
            </button>
        </div>
        
        <form action="{{ route('menu.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Menu</label>
                    <input type="text" name="name" placeholder="Masukkan nama menu" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Kategori</label>
                    <select name="category_id" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium cursor-pointer">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Harga (Rp)</label>
                    <input type="number" name="price" placeholder="25000" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Stok Awal</label>
                    <input type="number" name="quantity" placeholder="50" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">URL Gambar</label>
                    <input type="url" name="image" placeholder="https://..." class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
            </div>
            
            <button type="submit" class="w-full py-5 bg-brand-maroon text-white font-black rounded-3xl shadow-lg hover:bg-brand-maroon-light transition-all mt-4">
                SIMPAN MENU
            </button>
        </form>
    </div>
</div>

<!-- Modal Edit Menu -->
<div 
    x-data="{ open: false, menu: {}, action: '' }" 
    x-show="open" 
    @open-modal.window="if ($event.detail.id === 'modal-edit-menu') { open = true; menu = $event.detail.menu; action = '/pendataan-barang/' + menu.id }"
    class="fixed inset-0 z-[100] flex items-center justify-center p-6"
    x-cloak
>
    <div @click="open = false" class="absolute inset-0 bg-brand-maroon/20 backdrop-blur-sm"></div>
    <div class="bg-white w-full max-w-lg rounded-[40px] shadow-2xl relative z-10 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-2xl text-brand-maroon">Edit Menu</h3>
            <button @click="open = false" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="ph ph-x-circle text-3xl"></i>
            </button>
        </div>
        
        <form :action="action" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Menu</label>
                    <input type="text" name="name" :value="menu.name" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Kategori</label>
                    <select name="category_id" x-model="menu.category_id" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium cursor-pointer">
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Harga (Rp)</label>
                    <input type="number" name="price" :value="menu.price" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Stok</label>
                    <input type="number" name="quantity" :value="menu.stock?.quantity" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">URL Gambar</label>
                    <input type="url" name="image" :value="menu.image" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all text-sm font-medium">
                </div>
            </div>
            
            <button type="submit" class="w-full py-5 bg-brand-gold text-brand-maroon font-black rounded-3xl shadow-lg hover:bg-brand-gold-soft transition-all mt-4">
                UPDATE MENU
            </button>
        </form>
    </div>
</div>
@endsection

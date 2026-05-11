@extends('layouts.admin')

@section('title', 'Monitoring Stok')
@section('page_title', 'Status Stok Menu')

@section('content')
<!-- Low Stock Alert Section -->
@if($lowStockMenus->count() > 0)
<div class="mb-10 bg-red-50 border border-red-100 rounded-[32px] p-8 relative overflow-hidden">
    <div class="absolute -top-12 -right-12 w-48 h-48 bg-red-500/5 rounded-full blur-3xl"></div>
    
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center shadow-lg">
            <i class="ph ph-warning-circle text-white text-2xl font-bold"></i>
        </div>
        <h3 class="font-montserrat font-bold text-xl text-red-600 tracking-tight">Peringatan Stok Rendah</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($lowStockMenus as $menu)
        <div class="bg-white p-4 rounded-2xl flex justify-between items-center shadow-sm border border-red-100/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg overflow-hidden">
                    <img src="{{ $menu->image ?? 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=500&auto=format&fit=crop' }}" class="w-full h-full object-cover">
                </div>
                <span class="text-sm font-bold text-gray-700">{{ $menu->name }}</span>
            </div>
            <span class="text-xs font-black text-red-500 bg-red-50 px-3 py-1 rounded-full uppercase">{{ $menu->stock->quantity }} Porsi</span>
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- All Stocks Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @foreach($menus as $menu)
    <div class="bg-white rounded-[32px] overflow-hidden shadow-soft transition-all duration-300 hover:shadow-xl">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <div class="w-14 h-14 rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ $menu->image ?? 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=500&auto=format&fit=crop' }}" class="w-full h-full object-cover">
                </div>
                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $menu->stock->quantity < 10 ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-500' }}">
                    {{ $menu->stock->quantity < 10 ? 'Kritis' : 'Aman' }}
                </span>
            </div>

            <h4 class="font-bold text-gray-800 text-lg mb-1">{{ $menu->name }}</h4>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">{{ $menu->category->name }}</p>
            
            <div class="space-y-4">
                <div class="flex justify-between items-end">
                    <span class="text-sm font-medium text-gray-500">Ketersediaan</span>
                    <span class="text-lg font-black {{ $menu->stock->quantity < 10 ? 'text-red-500' : 'text-brand-maroon' }}">
                        {{ $menu->stock->quantity }} <span class="text-[10px] text-gray-400 font-bold uppercase ml-1">Porsi</span>
                    </span>
                </div>
                
                <!-- Progress Bar -->
                @php
                    $percentage = min(($menu->stock->quantity / 100) * 100, 100);
                    $color = $menu->stock->quantity < 10 ? 'bg-red-500' : ($menu->stock->quantity < 30 ? 'bg-brand-gold' : 'bg-green-500');
                @endphp
                <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-1000 {{ $color }}" style="width: {{ $percentage }}%"></div>
                </div>
                
                <div class="flex justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    <span>Terjual ({{ $menu->transaction_details_count ?? 0 }})</span>
                    <span>Target (100)</span>
                </div>
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-50 flex justify-between items-center">
            <span class="text-xs font-bold text-gray-400">Update Terakhir</span>
            <span class="text-xs font-medium text-gray-500">{{ $menu->stock->updated_at->diffForHumans() }}</span>
        </div>
    </div>
    @endforeach
</div>
@endsection

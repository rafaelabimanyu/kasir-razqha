@extends('layouts.admin')

@section('title', 'Riwayat Transaksi')
@section('page_title', 'Riwayat Penjualan Saya')

@section('content')
<div class="bg-white rounded-[40px] shadow-soft overflow-hidden border border-gray-50">
    <div class="p-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-montserrat font-bold text-xl text-brand-maroon">Daftar Transaksi</h3>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white rounded-xl text-xs font-bold text-gray-500 shadow-sm">Filter Tanggal</button>
            <button class="px-4 py-2 bg-white rounded-xl text-xs font-bold text-gray-500 shadow-sm">Export Excel</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left bg-gray-50/30">
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">ID Transaksi</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Waktu</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Menu</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Total Harga</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($transactions as $tx)
                <tr class="group hover:bg-brand-offwhite/50 transition-colors">
                    <td class="px-8 py-6">
                        <span class="text-sm font-bold text-gray-800">#{{ str_pad($tx->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold text-gray-700">{{ $tx->created_at->format('d M Y') }}</span>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $tx->created_at->format('H:i') }} WIB</span>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col gap-1">
                            @foreach($tx->details->take(2) as $detail)
                            <span class="text-xs font-medium text-gray-600">{{ $detail->menu->name }} (x{{ $detail->quantity }})</span>
                            @endforeach
                            @if($tx->details->count() > 2)
                            <span class="text-[10px] font-bold text-brand-gold">+{{ $tx->details->count() - 2 }} menu lainnya</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-sm font-black text-brand-maroon">Rp {{ number_format($tx->total_price, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-green-50 text-green-500">
                            {{ $tx->status == 'success' ? 'Selesai' : 'Batal' }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <button class="w-10 h-10 bg-gray-50 rounded-xl flex items-center justify-center text-gray-400 hover:bg-brand-maroon hover:text-white transition-all">
                            <i class="ph ph-printer text-xl"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-8 border-t border-gray-50 bg-gray-50/20">
        {{ $transactions->links() }}
    </div>
</div>
@endsection

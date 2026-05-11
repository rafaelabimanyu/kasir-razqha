@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Menu -->
    <div class="bg-white p-6 rounded-3xl shadow-soft group hover:translate-y-[-5px] transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                <i class="ph-fill ph-book-open text-2xl"></i>
            </div>
            <div id="chart-menu" class="w-20"></div>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Menu</p>
            <h3 class="text-3xl font-bold font-montserrat mt-1" id="stat-total-menu">{{ $totalMenu }}</h3>
            <p class="text-xs text-green-500 font-bold mt-2 flex items-center gap-1">
                <i class="ph ph-trend-up"></i> +2 Baru bulan ini
            </p>
        </div>
    </div>

    <!-- Total Stok -->
    <div class="bg-white p-6 rounded-3xl shadow-soft group hover:translate-y-[-5px] transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
                <i class="ph-fill ph-stack text-2xl"></i>
            </div>
            <div id="chart-stock" class="w-20"></div>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Stok Tersedia</p>
            <h3 class="text-3xl font-bold font-montserrat mt-1" id="stat-total-stock">{{ $totalStock }}</h3>
            <p class="text-xs text-{{ $totalStock < 50 ? 'red' : 'green' }}-500 font-bold mt-2 flex items-center gap-1">
                <i class="ph ph-info"></i> {{ $totalStock < 50 ? 'Stok menipis!' : 'Stok aman' }}
            </p>
        </div>
    </div>

    <!-- Transaksi -->
    <div class="bg-white p-6 rounded-3xl shadow-soft group hover:translate-y-[-5px] transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-all duration-300">
                <i class="ph-fill ph-shopping-cart-simple text-2xl"></i>
            </div>
            <div id="chart-transactions" class="w-20"></div>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Transaksi</p>
            <h3 class="text-3xl font-bold font-montserrat mt-1" id="stat-total-transactions">{{ $totalTransactions }}</h3>
            <p class="text-xs text-green-500 font-bold mt-2 flex items-center gap-1">
                <i class="ph ph-trend-up"></i> +15% dari kemarin
            </p>
        </div>
    </div>

    <!-- Pendapatan -->
    <div class="bg-white p-6 rounded-3xl shadow-soft group hover:translate-y-[-5px] transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-brand-gold/10 text-brand-gold rounded-2xl flex items-center justify-center group-hover:bg-brand-gold group-hover:text-white transition-all duration-300">
                <i class="ph-fill ph-currency-circle-dollar text-2xl"></i>
            </div>
            <div id="chart-revenue" class="w-20"></div>
        </div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Pendapatan Hari Ini</p>
            <h3 class="text-2xl font-bold font-montserrat mt-1" id="stat-today-revenue">Rp {{ number_format($revenue['today'], 0, ',', '.') }}</h3>
            <p class="text-xs text-gray-500 font-bold mt-2">Bulan ini: Rp {{ number_format($revenue['this_month'], 0, ',', '.') }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Menu Terlaris -->
    <div class="lg:col-span-1 bg-white p-8 rounded-[32px] shadow-soft">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-montserrat font-bold text-xl text-brand-maroon">Menu Terlaris</h3>
            <a href="#" class="text-xs font-bold text-brand-gold hover:underline">Lihat Semua</a>
        </div>
        
        <div class="space-y-6">
            @foreach($bestSelling as $menu)
            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-bold text-gray-700">{{ $menu->name }}</span>
                    <span class="text-xs font-bold text-gray-400">{{ $menu->transaction_details_count }} terjual</span>
                </div>
                <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-brand-maroon h-full rounded-full transition-all duration-1000" style="width: 0%" data-width="{{ min(($menu->transaction_details_count / ($bestSelling->max('transaction_details_count') ?: 1)) * 100, 100) }}%"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 p-6 bg-brand-maroon rounded-3xl text-white relative overflow-hidden">
            <i class="ph-fill ph-cooking-pot absolute -right-4 -bottom-4 text-8xl text-white/10"></i>
            <h4 class="font-bold mb-2">Tips Hari Ini</h4>
            <p class="text-xs text-white/70 leading-relaxed">Pastikan stok Rendang selalu tersedia di atas 20 porsi menjelang makan siang.</p>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="lg:col-span-2 bg-white p-8 rounded-[32px] shadow-soft flex flex-col">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-montserrat font-bold text-xl text-brand-maroon">Transaksi Terbaru</h3>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-brand-offwhite rounded-xl text-xs font-bold text-gray-500 hover:bg-gray-100 transition-colors">Semua</button>
                <button class="px-4 py-2 bg-brand-offwhite rounded-xl text-xs font-bold text-gray-500 hover:bg-gray-100 transition-colors">Selesai</button>
            </div>
        </div>

        <div class="overflow-x-auto flex-1">
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b border-gray-50">
                        <th class="pb-4 text-xs font-bold text-gray-400 uppercase tracking-widest">ID Transaksi</th>
                        <th class="pb-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kasir</th>
                        <th class="pb-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Total</th>
                        <th class="pb-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="pb-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Waktu</th>
                    </tr>
                </thead>
                <tbody id="transaction-table-body">
                    @foreach($recentTransactions as $tx)
                    <tr class="group hover:bg-brand-offwhite/50 transition-colors">
                        <td class="py-4">
                            <span class="text-sm font-bold text-gray-800">#{{ str_pad($tx->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-brand-gold/20 flex items-center justify-center text-[10px] font-bold text-brand-maroon">
                                    {{ strtoupper(substr($tx->user->username, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-gray-600">{{ $tx->user->username }}</span>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-sm font-bold text-brand-maroon">Rp {{ number_format($tx->total_price, 0, ',', '.') }}</span>
                        </td>
                        <td class="py-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $tx->status == 'success' ? 'bg-green-50 text-green-500' : ($tx->status == 'pending' ? 'bg-yellow-50 text-yellow-500' : 'bg-red-50 text-red-500') }}">
                                {{ $tx->status == 'success' ? 'Selesai' : ($tx->status == 'pending' ? 'Proses' : 'Gagal') }}
                            </span>
                        </td>
                        <td class="py-4 text-right">
                            <span class="text-xs font-medium text-gray-400">{{ $tx->created_at->diffForHumans() }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Skeleton for Polling -->
<div id="dashboard-skeleton" class="hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @for($i = 0; $i < 4; $i++)
        <div class="bg-white p-6 rounded-3xl shadow-soft">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 skeleton"></div>
                <div class="w-20 h-8 skeleton"></div>
            </div>
            <div class="w-24 h-4 skeleton mb-2"></div>
            <div class="w-32 h-8 skeleton"></div>
        </div>
        @endfor
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Progress bar animation
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.querySelectorAll('[data-width]').forEach(el => {
                el.style.width = el.getAttribute('data-width');
            });
        }, 500);
    });

    // Sparkline Charts
    const commonOptions = {
        chart: {
            type: 'line',
            height: 40,
            sparkline: { enabled: true },
            animations: { enabled: true, easing: 'easeinout', speed: 1000 }
        },
        stroke: { curve: 'smooth', width: 2 },
        tooltip: { fixed: { enabled: false } },
        colors: ['#D4AF37']
    };

    const charts = {
        menu: new ApexCharts(document.querySelector("#chart-menu"), { ...commonOptions, series: [{ data: [10, 15, 8, 12, 10, 15, 20] }], colors: ['#3B82F6'] }),
        stock: new ApexCharts(document.querySelector("#chart-stock"), { ...commonOptions, series: [{ data: [80, 75, 70, 85, 90, 82, 88] }], colors: ['#F97316'] }),
        transactions: new ApexCharts(document.querySelector("#chart-transactions"), { ...commonOptions, series: [{ data: [5, 10, 8, 15, 12, 20, 25] }], colors: ['#A855F7'] }),
        revenue: new ApexCharts(document.querySelector("#chart-revenue"), { ...commonOptions, series: [{ data: @json($revenue['sparkline']) }], colors: ['#D4AF37'] })
    };

    Object.values(charts).forEach(c => c.render());

    // Polling for real-time updates
    async function pollStats() {
        try {
            const response = await fetch('/api/stats');
            const data = await response.json();
            
            // Update Stats
            document.getElementById('stat-total-menu').textContent = data.totalMenu;
            document.getElementById('stat-total-stock').textContent = data.totalStock;
            document.getElementById('stat-total-transactions').textContent = data.totalTransactions;
            document.getElementById('stat-today-revenue').textContent = 'Rp ' + data.revenue.today.toLocaleString('id-ID');

            // Update Transaction Table
            const tbody = document.getElementById('transaction-table-body');
            // ... Logic to update table rows efficiently if needed ...
            
        } catch (error) {
            console.error('Polling failed:', error);
        }
    }

    setInterval(pollStats, 30000); // Every 30 seconds
</script>
@endsection
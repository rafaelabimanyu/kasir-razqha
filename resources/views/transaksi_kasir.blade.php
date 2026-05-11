@extends('layouts.admin')

@section('title', 'Point of Sales')
@section('page_title', 'Kasir - Order Baru')

@section('styles')
<style>
    .menu-card:hover img { transform: scale(1.1); }
    .cart-item-enter { animation: slideIn 0.3s ease-out; }
    @keyframes slideIn {
        from { transform: translateX(20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
</style>
@endsection

@section('content')
<div x-data="posSystem()" class="flex flex-col lg:flex-row gap-8 h-full">
    
    <!-- Left: Menu Selection -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Search & Filter -->
        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <div class="relative flex-1 group">
                <i class="ph ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-brand-maroon transition-colors"></i>
                <input 
                    type="text" 
                    x-model="search" 
                    placeholder="Cari menu lezat..." 
                    class="w-full pl-12 pr-4 py-4 bg-white border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:shadow-soft transition-all"
                >
            </div>
            <div class="flex gap-2 overflow-x-auto pb-2 no-scrollbar">
                <button 
                    @click="filterCategory = 'all'"
                    :class="filterCategory === 'all' ? 'bg-brand-maroon text-white' : 'bg-white text-gray-500 hover:bg-gray-50'"
                    class="px-6 py-4 rounded-2xl font-bold text-sm transition-all shadow-sm whitespace-nowrap"
                >
                    Semua
                </button>
                @foreach($categories as $cat)
                <button 
                    @click="filterCategory = '{{ $cat->id }}'"
                    :class="filterCategory === '{{ $cat->id }}' ? 'bg-brand-maroon text-white' : 'bg-white text-gray-500 hover:bg-gray-50'"
                    class="px-6 py-4 rounded-2xl font-bold text-sm transition-all shadow-sm whitespace-nowrap"
                >
                    {{ $cat->name }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="flex-1 overflow-y-auto pr-2 no-scrollbar pb-8">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                <template x-for="menu in filteredMenus" :key="menu.id">
                    <div 
                        @click="addToCart(menu)"
                        class="menu-card bg-white rounded-[32px] overflow-hidden shadow-soft cursor-pointer transition-all duration-300 hover:translate-y-[-8px] active:scale-95 group relative"
                    >
                        <div class="h-40 overflow-hidden relative">
                            <img :src="menu.image || 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=500&auto=format&fit=crop'" class="w-full h-full object-cover transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold text-brand-maroon shadow-sm" x-text="'Stok: ' + menu.stock.quantity"></div>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-gray-800 text-sm mb-1 truncate" x-text="menu.name"></h4>
                            <p class="text-brand-maroon font-black" x-text="formatPrice(menu.price)"></p>
                        </div>
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-brand-maroon/80 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white p-4">
                            <i class="ph-fill ph-plus-circle text-4xl mb-2"></i>
                            <span class="font-bold text-xs uppercase tracking-widest">Tambah Pesanan</span>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Empty State -->
            <div x-show="filteredMenus.length === 0" class="flex flex-col items-center justify-center py-20 opacity-40">
                <i class="ph ph-bowl-food text-8xl mb-4"></i>
                <p class="font-bold">Menu tidak ditemukan</p>
            </div>
        </div>
    </div>

    <!-- Right: Shopping Cart -->
    <div class="w-full lg:w-96 flex flex-col bg-white rounded-[40px] shadow-soft overflow-hidden border border-gray-50 h-[calc(100vh-140px)]">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-xl text-brand-maroon">Keranjang</h3>
            <button @click="cart = []" class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="ph ph-trash text-xl"></i>
            </button>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-8 space-y-6 no-scrollbar">
            <template x-for="(item, index) in cart" :key="item.id">
                <div class="flex items-center gap-4 cart-item-enter">
                    <div class="w-16 h-16 rounded-2xl overflow-hidden shadow-sm">
                        <img :src="item.image || 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?q=80&w=500&auto=format&fit=crop'" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h5 class="text-sm font-bold text-gray-800 truncate" x-text="item.name"></h5>
                        <p class="text-xs font-bold text-brand-gold" x-text="formatPrice(item.price)"></p>
                        
                        <div class="flex items-center gap-3 mt-2">
                            <button @click="updateQty(index, -1)" class="w-6 h-6 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-brand-maroon hover:text-white transition-all">
                                <i class="ph ph-minus text-xs"></i>
                            </button>
                            <span class="text-sm font-bold" x-text="item.qty"></span>
                            <button @click="updateQty(index, 1)" class="w-6 h-6 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-brand-maroon hover:text-white transition-all">
                                <i class="ph ph-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                    <button @click="removeFromCart(index)" class="text-gray-300 hover:text-red-500 transition-colors">
                        <i class="ph ph-x-circle text-xl"></i>
                    </button>
                </div>
            </template>

            <!-- Cart Empty -->
            <div x-show="cart.length === 0" class="flex flex-col items-center justify-center h-full opacity-30">
                <i class="ph ph-shopping-cart text-6xl mb-4"></i>
                <p class="font-bold text-sm">Pesanan masih kosong</p>
            </div>
        </div>

        <!-- Checkout Summary -->
        <div class="p-8 bg-brand-offwhite/50 space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm font-medium">Subtotal</span>
                <span class="text-gray-800 font-bold" x-text="formatPrice(totalPrice)"></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-500 text-sm font-medium">Pajak (10%)</span>
                <span class="text-gray-800 font-bold" x-text="formatPrice(tax)"></span>
            </div>
            <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                <span class="text-brand-maroon text-lg font-black uppercase tracking-tight">Total</span>
                <span class="text-brand-maroon text-2xl font-black" x-text="formatPrice(grandTotal)"></span>
            </div>
            
            <button 
                @click="checkout()"
                :disabled="cart.length === 0 || loading"
                class="w-full py-5 bg-brand-maroon text-white font-black rounded-3xl shadow-lg hover:bg-brand-maroon-light active:scale-95 disabled:opacity-50 disabled:active:scale-100 transition-all flex items-center justify-center gap-3 mt-4"
            >
                <template x-if="!loading">
                    <span class="flex items-center gap-2">
                        BAYAR SEKARANG
                        <i class="ph ph-arrow-right font-bold"></i>
                    </span>
                </template>
                <template x-if="loading">
                    <i class="ph ph-circle-notch animate-spin text-2xl"></i>
                </template>
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function posSystem() {
        return {
            menus: @json($menus),
            search: '',
            filterCategory: 'all',
            cart: [],
            loading: false,

            get filteredMenus() {
                return this.menus.filter(menu => {
                    const matchesSearch = menu.name.toLowerCase().includes(this.search.toLowerCase());
                    const matchesCategory = this.filterCategory === 'all' || menu.category_id == this.filterCategory;
                    return matchesSearch && matchesCategory;
                });
            },

            get totalPrice() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            },

            get tax() {
                return this.totalPrice * 0.1;
            },

            get grandTotal() {
                return this.totalPrice + this.tax;
            },

            addToCart(menu) {
                if (menu.stock.quantity <= 0) {
                    Swal.fire({ icon: 'error', title: 'Oops...', text: 'Stok sudah habis!' });
                    return;
                }

                const index = this.cart.findIndex(item => item.id === menu.id);
                if (index > -1) {
                    if (this.cart[index].qty < menu.stock.quantity) {
                        this.cart[index].qty++;
                    } else {
                        Swal.fire({ icon: 'warning', title: 'Perhatian', text: 'Stok maksimal tercapai.' });
                    }
                } else {
                    this.cart.push({ ...menu, qty: 1 });
                }
            },

            removeFromCart(index) {
                this.cart.splice(index, 1);
            },

            updateQty(index, delta) {
                const item = this.cart[index];
                const newQty = item.qty + delta;
                
                if (newQty > 0 && newQty <= item.stock.quantity) {
                    item.qty = newQty;
                } else if (newQty === 0) {
                    this.removeFromCart(index);
                } else {
                    Swal.fire({ icon: 'warning', title: 'Perhatian', text: 'Stok tidak mencukupi.' });
                }
            },

            formatPrice(price) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(price);
            },

            async checkout() {
                this.loading = true;
                const items = this.cart.map(item => ({
                    menu_id: item.id,
                    quantity: item.qty
                }));

                try {
                    const response = await fetch('/api/transactions', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ items })
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Success Receipt Summary
                        let receiptHtml = `
                            <div class="text-left text-sm space-y-2 mt-4 font-mono bg-gray-50 p-4 rounded-xl border border-dashed border-gray-300">
                                <div class="flex justify-between border-b pb-2 mb-2">
                                    <span>No: #${String(result.data.transaction_id).padStart(5, '0')}</span>
                                    <span>${result.data.time}</span>
                                </div>
                                ${result.data.items.map(i => `
                                    <div class="flex justify-between">
                                        <span>${i.name} x${i.quantity}</span>
                                        <span>${this.formatPrice(i.price * i.quantity)}</span>
                                    </div>
                                `).join('')}
                                <div class="flex justify-between border-t pt-2 font-bold text-brand-maroon">
                                    <span>TOTAL</span>
                                    <span>${this.formatPrice(result.data.total)}</span>
                                </div>
                            </div>
                        `;

                        Swal.fire({
                            title: 'Pembayaran Berhasil!',
                            html: receiptHtml,
                            icon: 'success',
                            confirmButtonText: 'Cetak Struk',
                            showCancelButton: true,
                            cancelButtonText: 'Tutup',
                            confirmButtonColor: '#5B121C',
                        }).then((choice) => {
                            if (choice.isConfirmed) {
                                window.print();
                            }
                            this.resetPOS(result.data.transaction_id);
                        });

                    } else {
                        Swal.fire({ icon: 'error', title: 'Checkout Gagal', text: result.message });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan sistem.' });
                } finally {
                    this.loading = false;
                }
            },

            resetPOS(txId) {
                // Update local stocks
                this.cart.forEach(item => {
                    const menu = this.menus.find(m => m.id === item.id);
                    if (menu) menu.stock.quantity -= item.qty;
                });
                this.cart = [];
            }
        }
    }
</script>
@endsection

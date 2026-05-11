<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kasir Rumah Makan Padang</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- External Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @yield('styles')
</head>
<body class="bg-brand-offwhite min-h-screen flex overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 maroon-gradient h-screen text-white flex flex-col shadow-2xl z-50">
        <div class="p-8 flex items-center gap-3">
            <div class="w-10 h-10 bg-brand-gold rounded-xl flex items-center justify-center shadow-lg">
                <i class="ph-fill ph-storefront text-brand-maroon text-2xl"></i>
            </div>
            <span class="font-montserrat font-bold text-xl tracking-tight">RAZQH POS</span>
        </div>

        <nav class="flex-1 px-4 mt-4 space-y-2 overflow-y-auto">
            <p class="text-white/40 text-xs font-bold uppercase tracking-widest px-4 mb-4">Utama</p>
            
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-white/10 border-l-4 border-brand-gold text-brand-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                <i class="ph ph-squares-four text-xl"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <p class="text-white/40 text-xs font-bold uppercase tracking-widest px-4 mt-8 mb-4">Manajemen</p>
            
            <a href="/pendataan-barang" class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->is('pendataan-barang') ? 'bg-white/10 border-l-4 border-brand-gold text-brand-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                <i class="ph ph-package text-xl"></i>
                <span class="font-medium">Menu & Kategori</span>
            </a>

            <a href="/stok-barang" class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->is('stok-barang') ? 'bg-white/10 border-l-4 border-brand-gold text-brand-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                <i class="ph ph-stack text-xl"></i>
                <span class="font-medium">Stok Barang</span>
            </a>

            <a href="/registrasi-petugas" class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->is('registrasi-petugas') ? 'bg-white/10 border-l-4 border-brand-gold text-brand-gold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                <i class="ph ph-users-three text-xl"></i>
                <span class="font-medium">Petugas</span>
            </a>

            <p class="text-white/40 text-xs font-bold uppercase tracking-widest px-4 mt-8 mb-4">Laporan</p>
            
            <a href="#" class="group flex items-center gap-3 px-4 py-3 rounded-2xl transition-all duration-300 text-white/70 hover:bg-white/5 hover:text-white">
                <i class="ph ph-chart-line-up text-xl"></i>
                <span class="font-medium">Laporan Penjualan</span>
            </a>
        </nav>

        <div class="p-6">
            <div class="bg-white/5 rounded-3xl p-4 flex items-center gap-3 border border-white/10">
                <div class="w-10 h-10 rounded-full bg-brand-gold flex items-center justify-center text-brand-maroon font-bold">
                    {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold truncate">{{ auth()->user()->username }}</p>
                    <p class="text-xs text-white/50 capitalize">{{ auth()->user()->role }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white/50 hover:text-white transition-colors">
                        <i class="ph ph-sign-out text-xl"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
        <!-- Header -->
        <header class="h-20 glass flex items-center justify-between px-8 z-40">
            <h1 class="font-montserrat font-bold text-2xl text-brand-maroon">@yield('page_title')</h1>
            
            <div class="flex items-center gap-4">
                <div class="hidden md:flex flex-col items-end">
                    <p class="text-xs text-gray-500 font-medium">{{ now()->format('l, d F Y') }}</p>
                    <p class="text-sm font-bold" id="live-clock">00:00:00</p>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-white shadow-soft flex items-center justify-center text-brand-maroon hover:bg-brand-maroon hover:text-white transition-all duration-300 cursor-pointer">
                    <i class="ph ph-bell text-xl"></i>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </div>
    </main>

    <script>
        // Live Clock
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', { hour12: false });
            document.getElementById('live-clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Toast Helper
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(session('success'))
            Toast.fire({ icon: 'success', title: "{{ session('success') }}" });
        @endif
        @if(session('error'))
            Toast.fire({ icon: 'error', title: "{{ session('error') }}" });
        @endif
    </script>
    @yield('scripts')
</body>
</html>

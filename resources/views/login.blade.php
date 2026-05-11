<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Razqh POS</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="maroon-gradient min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[32px] shadow-glass p-10 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-brand-gold/10 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -left-12 w-32 h-32 bg-brand-maroon/5 rounded-full blur-2xl"></div>

        <div class="flex flex-col items-center mb-10 relative z-10">
            <div class="w-20 h-20 bg-brand-maroon rounded-3xl flex items-center justify-center shadow-lg mb-6">
                <i class="ph-fill ph-storefront text-brand-gold text-4xl"></i>
            </div>
            <h1 class="font-montserrat font-bold text-2xl text-brand-maroon tracking-tight text-center">Rumah Makan<br>Padang</h1>
            <p class="text-gray-400 text-sm font-medium mt-2">Masuk ke sistem kasir</p>
        </div>

        <form action="/login" method="POST" class="space-y-6 relative z-10">
            @csrf

            @if($errors->any())
            <div class="bg-red-50 text-red-500 p-4 rounded-2xl text-xs font-bold border border-red-100 animate-shake">
                {{ $errors->first() }}
            </div>
            @endif

            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Username</label>
                <div class="relative group">
                    <i class="ph ph-user absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-brand-maroon transition-colors"></i>
                    <input type="text" name="username" placeholder="admin / kasir" required
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all font-medium text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Password</label>
                <div class="relative group">
                    <i class="ph ph-lock absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-brand-maroon transition-colors"></i>
                    <input type="password" name="password" placeholder="••••••••" required
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl outline-none focus:border-brand-maroon focus:bg-white transition-all font-medium text-sm">
                </div>
            </div>

            <div class="flex items-center justify-between py-2">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-brand-maroon focus:ring-brand-maroon">
                    <span class="text-xs font-medium text-gray-500 group-hover:text-gray-700 transition-colors">Ingat saya</span>
                </label>
                <a href="#" class="text-xs font-bold text-brand-gold hover:underline">Lupa password?</a>
            </div>

            <button type="submit" class="w-full py-4 bg-brand-maroon text-white font-bold rounded-2xl shadow-lg hover:bg-brand-maroon-light hover:translate-y-[-2px] active:translate-y-[0] transition-all duration-300 flex items-center justify-center gap-2">
                <span>Masuk Sekarang</span>
                <i class="ph ph-arrow-right font-bold"></i>
            </button>
        </form>

        <p class="text-center text-gray-400 text-xs mt-10 relative z-10">
            &copy; 2026 Razqh POS. All rights reserved.
        </p>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .animate-shake { animation: shake 0.4s ease-in-out; }
    </style>
</body>
</html>
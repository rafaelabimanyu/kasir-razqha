<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Kasir - Rumah Makan Padang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-bg: #1E0A11;
            --primary-red: #7A1831;
            --text-gold: #e8bd74;
            --bg-color: #f8f6f4;
            --card-bg: #ffffff;
            --text-dark: #111827;
            --text-muted: #6b7280;
            --border-color: #f3f4f6;
            --safe-green: #10b981;
            --danger-red: #ef4444;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            display: flex;
            min-height: 100vh;
            background-image: 
                radial-gradient(#e5d9d9 1px, transparent 1px),
                radial-gradient(#e5d9d9 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 270px;
            background-color: var(--sidebar-bg);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 24px 20px;
            box-sizing: border-box;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding: 0 5px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #e8bd74, #b58d45);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(232, 189, 116, 0.2);
        }

        .brand-icon svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        .brand-text h1 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: white;
            line-height: 1.2;
        }

        .brand-text span {
            color: var(--text-gold);
            font-size: 14px;
        }

        .role-box {
            border: 1px solid #4a1523;
            background-color: #320d18;
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 30px;
        }

        .role-box p {
            margin: 0;
            font-size: 12px;
            color: #a08890;
            margin-bottom: 4px;
        }

        .role-box h3 {
            margin: 0;
            font-size: 14px;
            color: var(--text-gold);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .role-indicator {
            width: 6px;
            height: 6px;
            background-color: var(--text-gold);
            border-radius: 50%;
            display: inline-block;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 12px;
            color: #d1b4bd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,0.05);
            color: white;
        }

        .nav-item.active .nav-link {
            background-color: var(--primary-red);
            color: white;
            border: 1px solid #942542;
            position: relative;
        }
        
        .nav-item.active .nav-link::after {
            content: '';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background-color: var(--text-gold);
            border-radius: 50%;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            color: #d1b4bd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            margin-top: auto;
        }

        .logout-btn:hover {
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 270px;
            padding: 30px;
            width: calc(100% - 270px);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            margin-bottom: 24px;
        }

        .header h2 {
            margin: 0 0 8px 0;
            font-size: 28px;
            color: var(--primary-red);
            font-weight: 700;
        }

        .header p {
            margin: 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        /* POS Container */
        .pos-container {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 30px;
            flex-grow: 1;
            overflow: hidden;
        }

        /* Menu Section */
        .menu-section {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        
        .category-filter {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            overflow-x: auto;
            padding-bottom: 8px;
        }
        
        .category-btn {
            padding: 10px 20px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.2s;
        }
        
        .category-btn:hover {
            border-color: #d1b4bd;
        }
        
        .category-btn.active {
            background-color: var(--primary-red);
            color: white;
            border-color: var(--primary-red);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 24px;
            overflow-y: auto;
            padding-right: 10px;
            padding-bottom: 20px;
        }

        /* Scrollbar Styling */
        .menu-grid::-webkit-scrollbar {
            width: 6px;
        }
        .menu-grid::-webkit-scrollbar-track {
            background: transparent;
        }
        .menu-grid::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .menu-card {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: #fce7f3;
        }

        .card-img-wrapper {
            position: relative;
            height: 220px;
            width: 100%;
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            background-color: #f3f4f6;
        }

        .card-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-content h3 {
            margin: 0 0 6px 0;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .category {
            margin: 0 0 24px 0;
            font-size: 14px;
            color: var(--text-muted);
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            margin-top: auto;
        }

        .price-info {
            display: flex;
            flex-direction: column;
        }

        .label {
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .price {
            font-size: 16px;
            font-weight: 700;
            color: #b92b27;
        }

        /* Cart Section */
        .cart-section {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            height: 100%;
        }

        .cart-header {
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .cart-count {
            background-color: var(--primary-red);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .cart-items {
            flex-grow: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-item {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .cart-item-img {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0 0 4px 0;
        }

        .cart-item-price {
            font-size: 14px;
            font-weight: 700;
            color: var(--primary-red);
            margin: 0;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8f9fa;
            padding: 6px 8px;
            border-radius: 8px;
        }

        .action-btn {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: white;
            border: 1px solid #e5e7eb;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: var(--text-dark);
        }

        .action-btn:hover {
            background: #f3f4f6;
        }
        
        .action-btn svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .item-qty {
            font-size: 14px;
            font-weight: 600;
            width: 20px;
            text-align: center;
        }

        /* Cart Summary */
        .cart-summary {
            padding: 24px;
            background: #fafafa;
            border-top: 1px solid var(--border-color);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            color: var(--text-muted);
        }

        .summary-row.total {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px dashed #d1d5db;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 24px;
        }
        
        .summary-row.total .value {
            color: var(--primary-red);
        }

        .checkout-btn {
            width: 100%;
            padding: 16px;
            background-color: var(--primary-red);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            background-color: #5c1225;
        }
        
        .checkout-btn:active {
            transform: scale(0.98);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .pos-container {
                grid-template-columns: 1fr;
            }
            .cart-section {
                height: 400px;
            }
            .main-content {
                height: auto;
            }
        }
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; width: 100%; padding: 20px; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 14C4 14 7 11 12 11C17 11 20 14 20 14L20 20H4V14Z"/>
                    <path d="M2 13C2 13 7 7 12 7C17 7 22 13 22 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="brand-text">
                <h1>Rumah Makan</h1>
                <span>Padang</span>
            </div>
        </div>

        <div class="role-box">
            <p>Role</p>
            <h3>Petugas Kasir <span class="role-indicator"></span></h3>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="/dashboard-kasir" class="nav-link">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item active">
                <a href="/transaksi-kasir" class="nav-link">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a href="/stok-barang-kasir" class="nav-link">
                    <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    Stok Barang
                </a>
            </li>
        </ul>

        <a href="/" class="logout-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            Keluar
        </a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <h2>Transaksi Baru</h2>
            <p>Pilih menu pesanan pelanggan</p>
        </div>

        <div class="pos-container">
            
            <!-- Menu Section -->
            <div class="menu-section">
                <!-- Categories -->
                <div class="category-filter">
                    <button class="category-btn active">Semua Menu</button>
                    <button class="category-btn">Daging</button>
                    <button class="category-btn">Ayam</button>
                    <button class="category-btn">Sayur</button>
                    <button class="category-btn">Minuman</button>
                </div>

                <!-- Menu Grid -->
                <div class="menu-grid">
                    <div class="menu-card" onclick="addToCart('m1', 'Rendang Daging', 25000, 'https://images.unsplash.com/photo-1544025162-811114215b49?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1544025162-811114215b49?q=80&w=500" alt="Rendang">
                        </div>
                        <div class="card-content">
                            <h3>Rendang Daging</h3>
                            <p class="category">Daging</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 25.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu-card" onclick="addToCart('m2', 'Ayam Pop', 20000, 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500" alt="Ayam Pop">
                        </div>
                        <div class="card-content">
                            <h3>Ayam Pop</h3>
                            <p class="category">Ayam</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 20.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu-card" onclick="addToCart('m3', 'Gulai Kambing', 30000, 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?q=80&w=500" alt="Gulai Kambing">
                        </div>
                        <div class="card-content">
                            <h3>Gulai Kambing</h3>
                            <p class="category">Kambing</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 30.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu-card" onclick="addToCart('m4', 'Dendeng Balado', 25000, 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?q=80&w=500" alt="Dendeng Balado">
                        </div>
                        <div class="card-content">
                            <h3>Dendeng Balado</h3>
                            <p class="category">Daging</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 25.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-card" onclick="addToCart('m5', 'Gulai Tunjang', 28000, 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=500" alt="Gulai Tunjang">
                        </div>
                        <div class="card-content">
                            <h3>Gulai Tunjang</h3>
                            <p class="category">Daging</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 28.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-card" onclick="addToCart('m6', 'Sate Padang', 35000, 'https://images.unsplash.com/photo-1549488344-c189b2518e95?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1549488344-c189b2518e95?q=80&w=500" alt="Sate Padang">
                        </div>
                        <div class="card-content">
                            <h3>Sate Padang</h3>
                            <p class="category">Daging</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 35.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="menu-card" onclick="addToCart('m7', 'Es Teh Manis', 5000, 'https://images.unsplash.com/photo-1556881286-fc6915169721?q=80&w=500')">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1556881286-fc6915169721?q=80&w=500" alt="Es Teh">
                        </div>
                        <div class="card-content">
                            <h3>Es Teh Manis</h3>
                            <p class="category">Minuman</p>
                            <div class="card-footer">
                                <div class="price-info">
                                    <span class="label">Harga</span>
                                    <span class="price">Rp 5.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Section -->
            <div class="cart-section">
                <div class="cart-header">
                    <h3>Pesanan Saat Ini</h3>
                    <span class="cart-count">0 Item</span>
                </div>
                
                <div class="cart-items" id="cart-items-container">
                    <!-- Dynamic cart items will be rendered here -->
                </div>

                <div class="cart-summary">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal-val">Rp 0</span>
                    </div>
                    <div class="summary-row">
                        <span>Pajak (10%)</span>
                        <span id="tax-val">Rp 0</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total Bayar</span>
                        <span class="value" id="total-val">Rp 0</span>
                    </div>
                    
                    <button class="checkout-btn" onclick="processCheckout()">
                        Proses Pembayaran
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                </div>
            </div>

        </div>
    </main>

    <!-- Script for CRUD POS Interaction -->
    <script>
        let cart = [];

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
        }

        function renderCart() {
            const cartItemsContainer = document.getElementById('cart-items-container');
            const cartCountEl = document.querySelector('.cart-count');
            const subtotalEl = document.getElementById('subtotal-val');
            const taxEl = document.getElementById('tax-val');
            const totalEl = document.getElementById('total-val');
            
            cartItemsContainer.innerHTML = '';
            let subtotal = 0;
            let totalItems = 0;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = `
                    <div style="text-align: center; color: var(--text-muted); margin-top: 40px; display: flex; flex-direction: column; align-items: center;">
                        <svg style="width: 48px; height: 48px; margin-bottom: 10px; opacity: 0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        <p>Belum ada pesanan</p>
                    </div>
                `;
            } else {
                cart.forEach(item => {
                    const itemTotal = item.price * item.qty;
                    subtotal += itemTotal;
                    totalItems += item.qty;

                    const cartItemHTML = `
                        <div class="cart-item">
                            <img src="${item.img}" alt="${item.name}" class="cart-item-img">
                            <div class="cart-item-details">
                                <h4 class="cart-item-name">${item.name}</h4>
                                <p class="cart-item-price">${formatRupiah(itemTotal)}</p>
                            </div>
                            <div class="cart-item-actions">
                                <button class="action-btn" onclick="updateQty('${item.id}', -1)" title="Kurangi">
                                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                <span class="item-qty">${item.qty}</span>
                                <button class="action-btn" onclick="updateQty('${item.id}', 1)" title="Tambah">
                                    <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                <button class="action-btn" onclick="removeFromCart('${item.id}')" style="margin-left: 5px; color: var(--danger-red); border-color: #fca5a5; background: #fef2f2;" title="Hapus Item">
                                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </div>
                    `;
                    cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
                });
            }

            const tax = subtotal * 0.1;
            const total = subtotal + tax;

            cartCountEl.textContent = `${totalItems} Item`;
            subtotalEl.textContent = formatRupiah(subtotal);
            taxEl.textContent = formatRupiah(tax);
            totalEl.textContent = formatRupiah(total);
        }

        window.updateQty = function(id, change) {
            const itemIndex = cart.findIndex(i => i.id === id);
            if (itemIndex !== -1) {
                cart[itemIndex].qty += change;
                if (cart[itemIndex].qty <= 0) {
                    cart.splice(itemIndex, 1);
                }
                renderCart();
            }
        };

        window.removeFromCart = function(id) {
            cart = cart.filter(i => i.id !== id);
            renderCart();
        };

        window.addToCart = function(id, name, price, img) {
            const existingItem = cart.find(i => i.id === id);
            if (existingItem) {
                existingItem.qty += 1;
            } else {
                cart.push({ id, name, price, qty: 1, img });
            }
            renderCart();
        };

        window.processCheckout = function() {
            if (cart.length === 0) {
                alert("Pesanan masih kosong. Silakan tambahkan menu terlebih dahulu.");
                return;
            }
            alert("Pembayaran berhasil diproses! Terima kasih.");
            cart = [];
            renderCart();
        };

        document.addEventListener('DOMContentLoaded', () => {
            renderCart();
        });
    </script>

</body>
</html>

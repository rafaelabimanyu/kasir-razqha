<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stok Barang Kasir - Rumah Makan Padang</title>
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
            --safe-text: #059669;
            --danger-text: #dc2626;
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
            padding: 40px 50px;
            width: calc(100% - 270px);
            box-sizing: border-box;
        }

        .header {
            margin-bottom: 40px;
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

        /* Warning Box */
        .warning-box {
            background-color: #fff8f8;
            border: 1px solid #fed7d7;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 40px;
        }
        
        .warning-header {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #c53030;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        
        .warning-header svg {
            width: 20px; 
            height: 20px; 
            stroke: currentColor; 
            fill: none; 
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        
        .warning-item {
            background: white;
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        
        .warning-item:last-child {
            margin-bottom: 0;
        }
        
        .warning-item-name {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 15px;
        }
        
        .warning-item-stock {
            color: #c53030;
            font-weight: 700;
            font-size: 15px;
        }

        /* Card Grid Styles */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .menu-card {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
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
        }

        /* Status Tag */
        .status-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .status-safe {
            color: var(--safe-text);
        }
        
        .status-danger {
            color: var(--danger-text);
        }
        
        .status-tag svg {
            width: 14px; 
            height: 14px; 
            stroke: currentColor; 
            fill: none; 
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .card-content {
            padding: 24px;
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

        /* Progress & Stock Styles */
        .stock-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin-bottom: 8px;
        }
        
        .stock-row .label {
            color: var(--text-muted);
        }
        
        .stock-value-safe { 
            color: var(--safe-text); 
            font-weight: 700; 
        }
        
        .stock-value-danger { 
            color: var(--danger-text); 
            font-weight: 700; 
        }
        
        .progress-bar-bg {
            width: 100%;
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 16px;
        }
        
        .progress-fill-safe {
            height: 100%;
            background-color: var(--safe-green);
            border-radius: 4px;
        }
        
        .progress-fill-danger {
            height: 100%;
            background-color: var(--danger-red);
            border-radius: 4px;
        }
        
        .min-stock-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: var(--text-muted);
        }
        
        .min-stock-value {
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .card-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 800px) {
            .card-grid { grid-template-columns: 1fr; }
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
            <li class="nav-item">
                <a href="/transaksi-kasir" class="nav-link">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    Transaksi
                </a>
            </li>
            <li class="nav-item active">
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
            <h2>Stok Barang</h2>
            <p>Monitoring stok menu restoran</p>
        </div>

        <!-- Warning Box -->
        <div class="warning-box">
            <div class="warning-header">
                <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                Peringatan Stok Rendah
            </div>
            <div class="warning-item">
                <span class="warning-item-name">Ayam Pop</span>
                <span class="warning-item-stock">15 / 20 porsi</span>
            </div>
            <div class="warning-item">
                <span class="warning-item-name">Dendeng Balado</span>
                <span class="warning-item-stock">8 / 15 porsi</span>
            </div>
        </div>

        <div class="card-grid">
            
            <!-- Card 1 (Safe) -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1544025162-811114215b49?q=80&w=500" alt="Rendang">
                    <div class="status-tag status-safe">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Stok Aman
                    </div>
                </div>
                <div class="card-content">
                    <h3>Rendang</h3>
                    <p class="category">Daging</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-safe">50 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-safe" style="width: 100%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">20 porsi</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Danger) -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500" alt="Ayam Pop">
                    <div class="status-tag status-danger">
                        <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        Stok Rendah
                    </div>
                </div>
                <div class="card-content">
                    <h3>Ayam Pop</h3>
                    <p class="category">Ayam</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-danger">15 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-danger" style="width: 40%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">20 porsi</span>
                    </div>
                </div>
            </div>

            <!-- Card 3 (Safe) -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?q=80&w=500" alt="Gulai Kambing">
                    <div class="status-tag status-safe">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Stok Aman
                    </div>
                </div>
                <div class="card-content">
                    <h3>Gulai Kambing</h3>
                    <p class="category">Kambing</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-safe">30 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-safe" style="width: 100%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">15 porsi</span>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 (Danger) -->
             <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?q=80&w=500" alt="Dendeng Balado">
                    <div class="status-tag status-danger">
                        <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        Stok Rendah
                    </div>
                </div>
                <div class="card-content">
                    <h3>Dendeng Balado</h3>
                    <p class="category">Daging</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-danger">8 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-danger" style="width: 35%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">15 porsi</span>
                    </div>
                </div>
            </div>
            
            <!-- Card 5 (Safe) -->
             <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=500" alt="Gulai Tunjang">
                    <div class="status-tag status-safe">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Stok Aman
                    </div>
                </div>
                <div class="card-content">
                    <h3>Gulai Tunjang</h3>
                    <p class="category">Daging</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-safe">25 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-safe" style="width: 80%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">15 porsi</span>
                    </div>
                </div>
            </div>
            
            <!-- Card 6 (Safe) -->
             <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1549488344-c189b2518e95?q=80&w=500" alt="Sate Padang">
                    <div class="status-tag status-safe">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Stok Aman
                    </div>
                </div>
                <div class="card-content">
                    <h3>Sate Padang</h3>
                    <p class="category">Daging</p>
                    
                    <div class="stock-row">
                        <span class="label">Stok Saat Ini</span>
                        <span class="stock-value-safe">45 porsi</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-fill-safe" style="width: 100%;"></div>
                    </div>
                    <div class="min-stock-row">
                        <span>Minimum Stok</span>
                        <span class="min-stock-value">20 porsi</span>
                    </div>
                </div>
            </div>

        </div>

    </main>

</body>
</html>

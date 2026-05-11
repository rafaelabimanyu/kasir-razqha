<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir - Rumah Makan Padang</title>
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
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            display: flex;
            min-height: 100vh;
            /* Subtle pattern for background */
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
            margin-bottom: 30px;
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 24px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stat-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .icon-red { background-color: #7A1831; }
        .icon-yellow { background-color: #c99b38; }
        .icon-brown { background-color: #573b2a; }

        .stat-info {
            display: flex;
            flex-direction: column;
        }

        .stat-title {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 4px;
            font-weight: 500;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* Bottom Layout */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 30px;
        }

        /* Transaksi Baru Card */
        .new-trx-card {
            background-color: var(--primary-red);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(122, 24, 49, 0.2);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
            min-height: 350px;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .new-trx-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 100%);
        }

        .new-trx-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(122, 24, 49, 0.3);
        }

        .new-trx-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 24px;
            position: relative;
        }

        .new-trx-icon svg {
            width: 40px;
            height: 40px;
            stroke: var(--text-gold);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .new-trx-card h3 {
            margin: 0 0 10px 0;
            font-size: 26px;
            font-weight: 700;
            position: relative;
        }

        .new-trx-card p {
            margin: 0;
            font-size: 15px;
            color: #d1b4bd;
            position: relative;
        }

        /* Riwayat Transaksi */
        .riwayat-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            height: 100%;
            box-sizing: border-box;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title-wrapper {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-red);
            margin: 0;
        }

        .section-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }

        .dot-icon {
            width: 36px;
            height: 36px;
            background-color: #f5e4e8;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dot-icon div {
            width: 8px;
            height: 8px;
            background-color: var(--primary-red);
            border-radius: 50%;
        }

        .trx-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .trx-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            background-color: #ffffff;
            transition: all 0.2s;
        }

        .trx-item:hover {
            border-color: #d1b4bd;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            transform: translateX(4px);
        }

        .trx-info h4 {
            margin: 0 0 6px 0;
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .trx-info p {
            margin: 0;
            font-size: 12px;
            color: var(--text-muted);
        }
        
        .trx-info p span {
            color: var(--primary-red);
            font-weight: 500;
        }

        .trx-amount {
            text-align: right;
            font-size: 16px;
            font-weight: 700;
            color: var(--primary-red);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .bottom-grid { grid-template-columns: 1fr; }
            .new-trx-card { min-height: 250px; }
        }
        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr; }
            .main-content { margin-left: 0; width: 100%; padding: 20px; }
            .sidebar { display: none; }
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
            <li class="nav-item active">
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
            <h2>Dashboard Kasir</h2>
            <p>Sistem transaksi cepat dan mudah</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon icon-red">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Transaksi Saya</div>
                    <div class="stat-value">23</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon icon-yellow">
                    <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Total Penjualan</div>
                    <div class="stat-value">Rp 3.2 Jt</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-brown">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Shift</div>
                    <div class="stat-value">Siang</div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bottom-grid">
            
            <!-- Transaksi Baru (Big Button) -->
            <a href="#" class="new-trx-card">
                <div class="new-trx-icon">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <h3>Transaksi Baru</h3>
                <p>Mulai transaksi pembelian</p>
            </a>

            <!-- Riwayat Transaksi -->
            <div class="riwayat-card">
                <div class="section-header">
                    <div class="section-title-wrapper">
                        <h3 class="section-title">Riwayat Transaksi</h3>
                        <p class="section-subtitle">Transaksi terbaru hari ini</p>
                    </div>
                    <div class="dot-icon">
                        <div></div>
                    </div>
                </div>
                
                <div class="trx-list">
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Rendang</h4>
                            <p><span>TRX023</span> • 2 menit lalu</p>
                        </div>
                        <div class="trx-amount">
                            Rp 80.000
                        </div>
                    </div>
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Ayam Pop</h4>
                            <p><span>TRX022</span> • 8 menit lalu</p>
                        </div>
                        <div class="trx-amount">
                            Rp 45.000
                        </div>
                    </div>
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Gulai Kambing</h4>
                            <p><span>TRX021</span> • 15 menit lalu</p>
                        </div>
                        <div class="trx-amount">
                            Rp 150.000
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrator - Rumah Makan Padang</title>
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
            background-color: #3b0f1b;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand-icon svg {
            width: 26px;
            height: 26px;
            fill: var(--text-gold);
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

        .header h2 {
            margin: 0 0 8px 0;
            font-size: 28px;
            color: var(--text-dark);
            font-weight: 700;
        }

        .header p {
            margin: 0 0 40px 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 26px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Colors for icons */
        .icon-red { background-color: #8b1e39; }
        .icon-yellow { background-color: #d4a34b; }
        .icon-brown { background-color: #8b5a3b; }
        .icon-orange { background-color: #b95d30; }

        .stat-title {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-line {
            position: absolute;
            top: 35px;
            right: 26px;
            width: 22px;
            height: 4px;
            border-radius: 2px;
        }
        
        .line-red { background-color: #eed2d9; }
        .line-yellow { background-color: #f7ead1; }
        .line-brown { background-color: #e8dcd6; }
        .line-orange { background-color: #f1ddce; }

        /* Bottom Layout */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        /* Transaksi Terbaru */
        .transaksi-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .header-line {
            width: 35px;
            height: 4px;
            background-color: #d4a34b;
            border-radius: 2px;
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
            padding: 18px;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            background-color: #fafafa;
        }

        .trx-info h4 {
            margin: 0 0 6px 0;
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .trx-info p {
            margin: 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .trx-amount {
            text-align: right;
        }

        .trx-amount h4 {
            margin: 0 0 6px 0;
            font-size: 15px;
            font-weight: 700;
            color: #b92b27;
        }

        .trx-amount p {
            margin: 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Menu Terlaris */
        .terlaris-card {
            background: var(--primary-red);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(122, 24, 49, 0.2);
            color: white;
        }

        .terlaris-card .section-title {
            color: white;
        }

        .terlaris-list {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .terlaris-item {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .terlaris-info {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 500;
        }
        
        .terlaris-info span:last-child {
            color: var(--text-gold);
            font-weight: 600;
        }

        .progress-bar-container {
            width: 100%;
            height: 8px;
            background-color: rgba(255,255,255,0.15);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background-color: var(--text-gold);
            border-radius: 4px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .bottom-grid { grid-template-columns: 1fr; }
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
            <h3>Administrator</h3>
        </div>

        <ul class="nav-menu">
            <li class="nav-item active">
                <a href="/dashboard" class="nav-link">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/registrasi-petugas" class="nav-link">
                    <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                    Registrasi Petugas
                </a>
            </li>
            <li class="nav-item">
                <a href="/pendataan-barang" class="nav-link">
                    <svg viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    Pendataan Barang
                </a>
            </li>
            <li class="nav-item">
                <a href="/stok-barang" class="nav-link">
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
            <h2>Dashboard Administrator</h2>
            <p>Selamat datang di sistem kasir Rumah Makan Padang</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-line line-red"></div>
                <div class="stat-icon icon-red">
                    <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <div class="stat-title">Total Menu</div>
                <div class="stat-value">24</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-line line-yellow"></div>
                <div class="stat-icon icon-yellow">
                    <svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                </div>
                <div class="stat-title">Stok Tersedia</div>
                <div class="stat-value">1,234</div>
            </div>

            <div class="stat-card">
                <div class="stat-line line-brown"></div>
                <div class="stat-icon icon-brown">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path><path d="M16 11H6"></path></svg>
                </div>
                <div class="stat-title">Transaksi Hari Ini</div>
                <div class="stat-value">87</div>
            </div>

            <div class="stat-card">
                <div class="stat-line line-orange"></div>
                <div class="stat-icon icon-orange">
                    <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <div class="stat-title">Total Pendapatan</div>
                <div class="stat-value">Rp 12.5 Jt</div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bottom-grid">
            
            <!-- Transaksi Terbaru -->
            <div class="transaksi-card">
                <div class="section-header">
                    <h3 class="section-title">Transaksi Terbaru</h3>
                    <div class="header-line"></div>
                </div>
                
                <div class="trx-list">
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Rendang</h4>
                            <p>TRX001 • 14:30</p>
                        </div>
                        <div class="trx-amount">
                            <h4>Rp 80.000</h4>
                            <p>2x</p>
                        </div>
                    </div>
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Ayam Pop</h4>
                            <p>TRX002 • 14:25</p>
                        </div>
                        <div class="trx-amount">
                            <h4>Rp 45.000</h4>
                            <p>1x</p>
                        </div>
                    </div>
                    <div class="trx-item">
                        <div class="trx-info">
                            <h4>Gulai Kambing</h4>
                            <p>TRX003 • 14:10</p>
                        </div>
                        <div class="trx-amount">
                            <h4>Rp 150.000</h4>
                            <p>3x</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Terlaris -->
            <div class="terlaris-card">
                <div class="section-header">
                    <h3 class="section-title">Menu Terlaris Hari Ini</h3>
                </div>

                <div class="terlaris-list">
                    <div class="terlaris-item">
                        <div class="terlaris-info">
                            <span>Rendang</span>
                            <span>45 porsi</span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    
                    <div class="terlaris-item">
                        <div class="terlaris-info">
                            <span>Ayam Pop</span>
                            <span>32 porsi</span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: 70%;"></div>
                        </div>
                    </div>

                    <div class="terlaris-item">
                        <div class="terlaris-info">
                            <span>Gulai Kambing</span>
                            <span>28 porsi</span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: 60%;"></div>
                        </div>
                    </div>

                    <div class="terlaris-item">
                        <div class="terlaris-info">
                            <span>Dendeng Balado</span>
                            <span>24 porsi</span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: 50%;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
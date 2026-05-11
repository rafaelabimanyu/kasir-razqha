<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendataan Barang - Rumah Makan Padang</title>
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
        }

        .header-text h2 {
            margin: 0 0 8px 0;
            font-size: 28px;
            color: var(--text-dark);
            font-weight: 700;
        }

        .header-text p {
            margin: 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        .add-btn {
            background-color: var(--primary-red);
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 4px 10px rgba(122, 24, 49, 0.2);
            transition: all 0.2s;
        }

        .add-btn:hover {
            background-color: #611025;
            box-shadow: 0 6px 14px rgba(122, 24, 49, 0.3);
            transform: translateY(-1px);
        }

        .add-btn svg {
            width: 18px; 
            height: 18px; 
            stroke: currentColor; 
            fill: none; 
            stroke-width: 2; 
            stroke-linecap: round; 
            stroke-linejoin: round;
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

        .card-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 8px;
        }

        .icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            color: var(--text-dark);
            transition: background 0.2s;
        }

        .icon-btn:hover {
            background: #f3f4f6;
        }

        .icon-btn svg {
            width: 16px;
            height: 16px;
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

        .card-footer {
            display: flex;
            justify-content: space-between;
        }

        .price-info, .stock-info {
            display: flex;
            flex-direction: column;
        }

        .stock-info {
            text-align: right;
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

        .stock {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-gold);
        }

        /* Modal Styles */
        .modal-backdrop {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .modal-backdrop.show {
            display: flex;
            opacity: 1;
        }

        .modal-box {
            background: white;
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            transform: scale(0.95);
            transition: transform 0.2s ease;
        }

        .modal-backdrop.show .modal-box {
            transform: scale(1);
        }

        .modal-header {
            background-color: var(--primary-red);
            color: white;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .close-btn {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-btn svg {
            width: 20px; height: 20px; stroke: currentColor; stroke-width: 2; fill: none; stroke-linecap: round; stroke-linejoin: round;
        }

        .modal-body {
            padding: 24px;
            overflow-y: auto;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(122, 24, 49, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .card-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 800px) {
            .card-grid { grid-template-columns: 1fr; }
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
            <li class="nav-item">
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
            <li class="nav-item active">
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
            <div class="header-text">
                <h2>Pendataan Barang</h2>
                <p>Kelola menu masakan Padang</p>
            </div>
            <button class="add-btn" id="openModalBtn">
                <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Menu
            </button>
        </div>

        <div class="card-grid">
            <!-- Card 1 -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://www.frisianflag.com/storage/app/media/uploaded-files/rendang-padang.jpg" alt="rendang">
                    <div class="card-actions">
                        <button class="icon-btn" title="Edit">
                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button class="icon-btn" title="Hapus">
                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3>Rendang</h3>
                    <p class="category">Daging</p>
                    <div class="card-footer">
                        <div class="price-info">
                            <span class="label">Harga</span>
                            <span class="price">Rp 12.000</span>
                        </div>
                        <div class="stock-info">
                            <span class="label">Stok</span>
                            <span class="stock">50 porsi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://www.tasteatlas.com/images/dishes/41ec24bb6ea4428fae6280234a19b580.jpg" alt="Ayam Pop">
                    <div class="card-actions">
                        <button class="icon-btn" title="Edit">
                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button class="icon-btn" title="Hapus">
                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3>Ayam Pop</h3>
                    <p class="category">Ayam</p>
                    <div class="card-footer">
                        <div class="price-info">
                            <span class="label">Harga</span>
                            <span class="price">Rp 15.000</span>
                        </div>
                        <div class="stock-info">
                            <span class="label">Stok</span>
                            <span class="stock">40 porsi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://asset.kompas.com/crops/sOuyO86K4EXjTCRmHWBd4caSFKc=/38x72:838x605/1200x800/data/photo/2022/04/02/6247cfd4495ba.jpg" alt="Dendeng">
                    <div class="card-actions">
                        <button class="icon-btn" title="Edit">
                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button class="icon-btn" title="Hapus">
                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3>Dendeng</h3>
                    <p class="category">Dendeng</p>
                    <div class="card-footer">
                        <div class="price-info">
                            <span class="label">Harga</span>
                            <span class="price">Rp 16.000</span>
                        </div>
                        <div class="stock-info">
                            <span class="label">Stok</span>
                            <span class="stock">34 porsi</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 (Placeholder based on bottom crop of image) -->
             <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://www.dapurkobe.co.id/wp-content/uploads/gulai-padang.jpg" alt="Ayam Gulai">
                    <div class="card-actions">
                        <button class="icon-btn" title="Edit">
                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button class="icon-btn" title="Hapus">
                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3>Ayam Gulai</h3>
                    <p class="category">Ayam</p>
                    <div class="card-footer">
                        <div class="price-info">
                            <span class="label">Harga</span>
                            <span class="price">Rp 10.000</span>
                        </div>
                        <div class="stock-info">
                            <span class="label">Stok</span>
                            <span class="stock">24 porsi</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Card 5 -->
            <div class="menu-card">
                <div class="card-img-wrapper">
                    <img src="https://i0.wp.com/icone-inc.org/wp-content/uploads/2020/02/Nasi-Ayam-Bakar-Padang-dian.jpg?fit=400%2C283&ssl=1" alt="Ayam bakar">
                    <div class="card-actions">
                        <button class="icon-btn" title="Edit">
                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </button>
                        <button class="icon-btn" title="Hapus">
                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <h3>Ayam Bakar</h3>
                    <p class="category">Ayam</p>
                    <div class="card-footer">
                        <div class="price-info">
                            <span class="label">Harga</span>
                            <span class="price">Rp 10.000</span>
                        </div>
                        <div class="stock-info">
                            <span class="label">Stok</span>
                            <span class="stock">53 porsi</span>
                        </div>
                    </div>
                </div>
            </div>

    </main>

    <!-- Modal Tambah Menu -->
    <div class="modal-backdrop" id="modalTambahMenu">
        <div class="modal-box">
            <div class="modal-header">
                <h3>Tambah Menu Baru</h3>
                <button class="close-btn" id="closeModalBtn">
                    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" placeholder="Contoh: Rendang" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-input">
                            <option value="">Pilih Kategori</option>
                            <option value="Daging">Daging</option>
                            <option value="Ayam">Ayam</option>
                            <option value="Ikan">Ikan</option>
                            <option value="Kambing">Kambing</option>
                            <option value="Sayur">Sayur</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" placeholder="40000" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Stok (porsi)</label>
                        <input type="number" placeholder="50" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>URL Gambar</label>
                        <input type="text" placeholder="https://..." class="form-input">
                    </div>
                    <div style="margin-top: 24px;">
                        <button type="submit" class="add-btn" style="width: 100%; justify-content: center;">Simpan Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalTambahMenu');
            const openBtn = document.getElementById('openModalBtn');
            const closeBtn = document.getElementById('closeModalBtn');

            openBtn.addEventListener('click', () => {
                modal.classList.add('show');
            });

            closeBtn.addEventListener('click', () => {
                modal.classList.remove('show');
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>

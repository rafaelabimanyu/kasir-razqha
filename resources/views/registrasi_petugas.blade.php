<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Petugas - Rumah Makan Padang</title>
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

        /* Table Styles */
        .table-container {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background-color: var(--primary-red);
            color: white;
            text-align: left;
            padding: 18px 24px;
            font-size: 14px;
            font-weight: 600;
        }

        .table td {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-muted);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            color: white;
        }

        .avatar-s { background-color: #b95d30; }
        .avatar-a { background-color: #8b5a3b; }
        .avatar-d { background-color: #d4a34b; }

        .action-btns {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .action-btn.edit {
            color: #b95d30;
            background-color: #fcf1eb;
        }

        .action-btn.edit:hover {
            background-color: #f5dfd3;
        }

        .action-btn.delete {
            color: #e11d48;
            background-color: #ffe4e6;
        }

        .action-btn.delete:hover {
            background-color: #fecdd3;
        }

        .action-btn svg {
            width: 16px; 
            height: 16px; 
            stroke: currentColor; 
            fill: none; 
            stroke-width: 2; 
            stroke-linecap: round; 
            stroke-linejoin: round;
        }

        .table-footer {
            padding: 20px 24px;
            border-top: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-muted);
            background-color: var(--card-bg);
        }

        .table-footer span {
            color: var(--primary-red);
            font-weight: 700;
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
            <li class="nav-item active">
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
            <div class="header-text">
                <h2>Registrasi Petugas</h2>
                <p>Kelola data petugas kasir</p>
            </div>
            <button class="add-btn">
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                Tambah Petugas
            </button>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama Lengkap</th>
                        <th width="20%">Username</th>
                        <th width="20%">Telepon</th>
                        <th width="20%">Tanggal Bergabung</th>
                        <th width="10%" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar avatar-s">S</div>
                                Siti Nurhaliza
                            </div>
                        </td>
                        <td>siti.kasir</td>
                        <td>08123456789</td>
                        <td>15 Januari 2024</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn edit" title="Edit">
                                    <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar avatar-a">A</div>
                                Ahmad Rizki
                            </div>
                        </td>
                        <td>ahmad.kasir</td>
                        <td>08234567890</td>
                        <td>20 Februari 2024</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn edit" title="Edit">
                                    <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar avatar-d">D</div>
                                Dewi Sartika
                            </div>
                        </td>
                        <td>dewi.kasir</td>
                        <td>08345678901</td>
                        <td>10 Maret 2024</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn edit" title="Edit">
                                    <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="table-footer">
                Total Petugas: <span>3</span>
            </div>
        </div>

    </main>

</body>
</html>

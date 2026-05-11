# 🍱 Sistem Kasir Rumah Makan Padang

Sistem Kasir Rumah Makan Padang adalah aplikasi Point of Sales (POS) berbasis web yang dirancang khusus untuk manajemen operasional restoran Padang secara modern, efisien, dan profesional. Aplikasi ini menggabungkan estetika premium dengan performa tinggi untuk memberikan pengalaman terbaik bagi admin maupun kasir.

## 🚀 Fitur Unggulan

- **Advanced POS System**: Antarmuka penjualan yang seamless tanpa reload halaman (Single Page Feel) menggunakan Alpine.js.
- **Real-time Dashboard**: Visualisasi data penjualan 30 hari terakhir dengan grafik interaktif menggunakan ApexCharts.
- **Role-Based Access Control (RBAC)**: Pembatasan akses fitur antara Administrator dan Petugas/Kasir untuk keamanan data.
- **Automated Stock Management**: Pengurangan stok otomatis setiap kali transaksi berhasil dengan integritas database yang kuat.
- **Visual Grid Management**: Pengelolaan menu dengan tampilan grid card modern yang informatif.
- **Responsive Design**: Tampilan yang optimal di berbagai perangkat (Desktop, Tablet, dan Mobile).

## 🛠️ Tech Stack

Aplikasi ini dibangun menggunakan teknologi terkini:
- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Tailwind CSS 4, Alpine.js 3
- **Database**: MySQL / MariaDB
- **Charts**: ApexCharts
- **Icons**: Phosphor Icons
- **Notifications**: SweetAlert2

## 📦 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal Anda:

1. **Clone Repositori**
   ```bash
   git clone https://github.com/username/kasir-razqha.git
   cd kasir-razqha
   ```

2. **Instal Dependensi**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi dan Seeding**
   Jalankan migrasi database beserta data dummy realistis (30 hari riwayat transaksi).
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   npm run dev
   ```

## 📂 Struktur Folder Utama

- `app/Http/Controllers`: Logika bisnis utama (Auth, Dashboard, Menu, Transaction).
- `app/Models`: Definisi skema database dan relasi Eloquent (Menu, Stock, Transaction, dll).
- `app/Http/Middleware`: Kontrol akses berbasis role (`RoleMiddleware`).
- `resources/views`: Template antarmuka menggunakan Blade & Alpine.js.
- `resources/css/app.css`: Definisi sistem desain (Maroon-Gold theme & Glassmorphism).
- `database/seeders`: Simulasi data operasional masakan Padang.

---
Dikembangkan dengan ❤️ untuk kemajuan UMKM Kuliner Indonesia.

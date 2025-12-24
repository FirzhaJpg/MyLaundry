# MyLaundry - Sistem Manajemen Laundry

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-red" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green" alt="License">
</p>

## Tentang Project

MyLaundry adalah aplikasi manajemen laundry berbasis web yang dibangun dengan framework Laravel. Aplikasi ini dirancang untuk membantu pengusaha laundry dalam mengelola pesanan, pelanggan, dan jadwal pengiriman dengan mudah dan efisien.

### Fitur Utama

- **Manajemen Pesanan**: Kelola pesanan laundry dengan status tracking real-time
- **Manajemen Pelanggan**: Simpan data pelanggan dan riwayat pesanan
- **Jadwal Pengiriman**: Atur jadwal pengantaran dan penjemputan laundry
- **Tracking Status**: Monitor status pesanan dari proses hingga selesai
- **Riwayat Pesanan**: Lihat riwayat lengkap transaksi dan status perubahan

### Teknologi yang Digunakan

- **Backend**: Laravel 12.0
- **Frontend**: Blade Templates, Vite
- **Database**: MySQL/PostgreSQL/SQLite
- **Authentication**: Laravel Breeze/Sanctum
- **Styling**: Tailwind CSS

## Cara Menjalankan Project

### Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js dan NPM
- Database (MySQL/PostgreSQL/SQLite)

### Instalasi

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd MyLaundry
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mylaundry
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migration**
   ```bash
   php artisan migrate
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

### Menjalankan Aplikasi

**Mode Development:**
```bash
# Jalankan server development
php artisan serve

# Jalankan Vite untuk asset compilation (terminal terpisah)
npm run dev
```

**Atau gunakan script composer:**
```bash
composer run dev
```

Aplikasi akan berjalan di `http://localhost:8000`

### Setup Otomatis

Gunakan script setup untuk instalasi otomatis:
```bash
composer run setup
```

## Screenshots

<!-- 
  Bagian ini untuk menambahkan screenshot aplikasi.
  Contoh format:
  
  ### Dashboard
  ![Dashboard](screenshots/dashboard.png)
  
  ### Manajemen Pesanan
  ![Manajemen Pesanan](screenshots/orders.png)
  
  ### Detail Pesanan
  ![Detail Pesanan](screenshots/order-detail.png)
-->

*Silakan tambahkan screenshot aplikasi di sini*

## Struktur Database

### Tabel Utama

- **users**: Data pengguna (admin, staff)
- **orders**: Data pesanan laundry
- **order_status_histories**: Riwayat perubahan status pesanan
- **delivery_schedules**: Jadwal pengiriman
- **roles**: Hak akses pengguna

## Kontribusi

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

## License

Project ini dilisensikan under MIT License - lihat file [LICENSE](LICENSE) untuk detailnya.

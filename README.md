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

<img width="1919" height="998" alt="Screenshot 2025-12-23 230831" src="https://github.com/user-attachments/assets/dfdf2937-034c-401e-af15-32d6f14bf31a" />
<img width="1919" height="994" alt="Screenshot 2025-12-23 230847" src="https://github.com/user-attachments/assets/d79326b0-e423-468b-b7f3-3d068e2f9547" />
<img width="1919" height="990" alt="Screenshot 2025-12-23 230854" src="https://github.com/user-attachments/assets/6525b2ed-6d82-454d-9cd3-f19680300b14" />
<img width="1919" height="1001" alt="Screenshot 2025-12-23 230859" src="https://github.com/user-attachments/assets/a6c9d618-cec1-4ed1-ab5c-14d6b238bb32" />
<img width="1919" height="998" alt="Screenshot 2025-12-23 230919" src="https://github.com/user-attachments/assets/8271edd2-7905-41b9-9fc5-93f866f92993" />
<img width="1919" height="1001" alt="Screenshot 2025-12-23 230927" src="https://github.com/user-attachments/assets/371c0f83-2e44-483c-9f15-493665773066" />

Gambar diatas adalah bagian dari sisi admin.

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

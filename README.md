<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

# System Inventaris Barang
[![Laravel Version](https://img.shields.io/badge/Laravel-v10+-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](https://opensource.org/licenses/MIT)
[![Build Status](https://img.shields.io/badge/Status-Stable-success?style=flat-square)]()

## Deskripsi
Aplikasi berbasis web untuk manajemen inventaris, pelacakan aset, dan dokumentasi peminjaman barang. Dibangun dengan framework Laravel untuk memastikan keamanan dan skalabilitas.

## Fitur Utama

* **Manajemen Inventaris:** Pencatatan aset secara mendetail termasuk kategori, kondisi, dan status ketersediaan.
* **Sirkulasi Barang:** Sistem peminjaman dan pengembalian yang terintegrasi dengan riwayat transaksi.
* **Pelaporan:** Fitur ekspor data untuk kebutuhan audit dan cetak laporan inventaris secara periodik.
* **Keamanan & Hak Akses:** Autentikasi berbasis peran (Role-Based Access Control) untuk Admin dan Staf.

## Spesifikasi Teknis

* **Framework:** Laravel 12
* **Language:** PHP 8.3+
* **Database:** MySQL / MariaDB
* **Frontend:** Blade Templating, CSS Framework (Tailwind/Bootstrap)

## Langkah Instalasi

Pastikan perangkat Anda telah terpasang PHP, Composer, dan Node.js sebelum memulai.

1.  **Kloning Repositori**
    ```bash
    git clone [https://github.com/Zhaxss/system_inventaris_laravel.git](https://github.com/Zhaxss/system_inventaris_laravel.git)
    cd system_inventaris_laravel
    ```

2.  **Instalasi Dependensi**
    ```bash
    composer install
    npm install && npm run dev
    ```

3.  **Konfigurasi Lingkungan**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
    ```bash
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate
    ```

5.  **Menjalankan Aplikasi**
    ```bash
    php artisan serve
    ```

## Lisensi

Proyek ini didistribusikan di bawah lisensi MIT. Lihat file `LICENSE` untuk informasi lebih lanjut.
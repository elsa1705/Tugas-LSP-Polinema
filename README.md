<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/Fanzirfan27/lsp_polinema/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Arsip Surat LSP Polinema

Aplikasi berbasis web untuk pengelolaan arsip surat di lingkungan LSP Polinema.  
Dibangun menggunakan **Laravel** dan **Vite.js**, sistem ini memudahkan proses pencatatan, pencarian, dan pengelolaan surat secara digital.

---

## Tujuan

Menyediakan platform yang efisien dan terstruktur untuk mengelola surat masuk dan keluar, serta menyimpan arsip digital yang mudah diakses dan dicari.

---

## Fitur Utama

1. **Kategori Surat**
   - Input data kategori surat
   - Update kategori surat
   - Hapus kategori surat
   - Pencarian kategori surat

2. **Arsip Surat**
   - Upload arsip surat (insert file)
   - Update file arsip
   - Hapus arsip surat
   - Pencarian arsip berdasarkan kata kunci

3. **Halaman About**
   - Menampilkan identitas mahasiswa pengembang aplikasi

---

## Cara Menjalankan Aplikasi

1. **Clone repository**
   ```bash
   git clone https://github.com/Fanzirfan27/lsp-polinema.git
   cd lsp-polinema
   ```

2. **Install dependencies**

    ```bash 
    composer install
    npm install && npm run dev
    ```

3. **Konfigurasi environment**
    1. file database ada di file db_arsip-surat.sql
    2. Salin file .env.example menjadi .env
    3. Atur koneksi database sesuai dengan konfigurasi di database sql
    ```bash
    php artisan key:generate
    ```

4. **Migrasi dan seeding database**
    ```bash
    php artisan migrate --seed
    ```

5. **Jalankan server lokal**
    ```bash
    php artisan serve
    ```
    masuk ke /halaman

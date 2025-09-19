<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/elsa1705/Tugas-LSP-Polinema/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Arsip Surat LSP Polinema

Aplikasi berbasis web untuk pengelolaan arsip surat di lingkungan LSP Polinema.  
Dibangun menggunakan *Laravel* dan *Vite.js*, sistem ini memudahkan proses pencatatan, pencarian, dan pengelolaan surat secara digital.

---

## Tujuan

Menyediakan platform yang efisien dan terstruktur untuk mengelola surat masuk dan keluar, serta menyimpan arsip digital yang mudah diakses dan dicari.

---

## Fitur Utama

1. *Kategori Surat*
   - Input data kategori surat
   - Update kategori surat
   - Hapus kategori surat
   - Pencarian kategori surat

2. *Arsip Surat*
   - Upload arsip surat (insert file)
   - Update file arsip
   - Hapus arsip surat
   - Pencarian arsip berdasarkan kata kunci

3. *Halaman About*
   - Menampilkan identitas mahasiswa pengembang aplikasi

---

## Cara Menjalankan Aplikasi

1. *Clone repository*
   bash
   git clone https://github.com/Fanzirfan27/lsp-polinema.git
   cd lsp-polinema
   

2. *Install dependencies*

    bash 
    composer install
    npm install && npm run dev
    

3. *Konfigurasi environment*
    1. file database ada di file db_arsip-surat.sql
    2. Salin file .env.example menjadi .env
    3. Atur koneksi database sesuai dengan konfigurasi di database sql
    bash
    php artisan key:generate
    

4. *Migrasi dan seeding database*
    bash
    php artisan migrate --seed
    

5. *Jalankan server lokal*
    bash
    php artisan serve
    
    masuk ke /halaman

*Screenshot Aplikasi*

1. Halaman Arsip Surat
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/c134f539-c690-4f01-a7a3-9578ea41d364" />

2. Halaman Kategori Surat
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/9453bec6-c528-4456-b2bc-02bf7f68b2d4" />

3. Halaman About
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/15d3a610-aed0-4720-9c5e-330638355c03" />

5. Form Tambah Arsip Surat
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/07a24cb4-1cbc-49fc-ab52-20ef173cbc4a" />

6. Tampilan lihat Arsip
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/a5b2cc11-5ed4-4b74-96a0-020743d24c06" />

7. Form Tambah Kategori Surat
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/a1b5ad52-e70d-437e-a0c3-e09d8fa94b36" />

8. Form Edit Kategori Surat
   <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/2d33de15-ccb6-417a-a637-560be27f6376" />

9. Pop Up Hapus Arsip Surat
    <img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/f9f3df9f-6845-4e6c-8dc1-22d822d93211" />

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

**Screenshot Aplikasi**

1. Halaman Arsip Surat
   ![tampilan arsip surat](https://github.com/user-attachments/assets/baf56a9e-12b8-438d-9750-57c42ab076e3)

3. Halaman Kategori Surat
   ![tampilan kategori surat](https://github.com/user-attachments/assets/de52ef04-ae36-48e7-a24c-b83b789f6fb7)

4. Halaman About
   ![about](https://github.com/user-attachments/assets/c1817dd1-ce47-4041-8c30-fb8a0bc991ee)

5. Form Tambah Arsip Surat
   ![tambah arsip surat](https://github.com/user-attachments/assets/dfa38227-d5e2-449d-a86d-e1b7d86d898a)

7. Tampilan lihat Arsip
   <img width="1908" height="1350" alt="view arsip" src="https://github.com/user-attachments/assets/4c4de7da-16d6-4a8c-8f09-08a3407862e4" />

8. Halaman Kategori Surat
   ![tampilan kategori surat](https://github.com/user-attachments/assets/82d6f44a-a209-4eb2-9b21-25037922425c)

10. Form Tambah Kategori Surat
   ![tambah kategori surat](https://github.com/user-attachments/assets/bcb29f02-48c4-4b61-ada1-78e8a419ea44)

11. Form Edit Kategori Surat
    ![edit kategori surat](https://github.com/user-attachments/assets/12ce7194-1db2-49a1-82ca-9c11231684f8)
    
12. Pop Up Hapus Arsip Surat
    ![hapus arsip surat](https://github.com/user-attachments/assets/dcc288c2-2f66-400a-b904-15f7f3a12f9a)

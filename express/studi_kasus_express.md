# Studi Kasus Express.js: "Sistem Inventaris Kedai Kopi"

**Cerita (Latar Belakang):**
Sebuah kedai kopi bernama "Senja Kopi" mulai kewalahan mencatat stok biji kopi secara manual di buku tulis. Barista sering kali lupa mencatat jika biji kopi Arabika sudah habis. Pemilik kedai meminta Anda membuatkan sebuah API (Backend) sangat sederhana untuk mencatat dan melihat stok biji kopi yang tersedia hari ini. Karena ini baru purwarupa (prototype), pemilik kedai setuju data disimpan sementara di dalam memory (Array) saja, tidak perlu database sungguhan dulu.

**Requirements (Tugas Anda):**

Buatkan REST API menggunakan Express.js dengan ketentuan berikut:

1.  **Daftar Menu (Data Awal):**
    Siapkan array berisi 2 data awal (dummy):
    - ID: 1, Nama: "Arabika Gayo", Stok: 15 (kg)
    - ID: 2, Nama: "Robusta Temanggung", Stok: 0 (kg)

2.  **Melihat Semua Stok (GET):**
    - Buat endpoint `GET /api/inventory`
    - Harus mengembalikan data array dalam format JSON.

3.  **Menambah Stok Kopi Baru (POST):**
    - Buat endpoint `POST /api/inventory`
    - Menerima payload JSON: `{ "name": "Nama Kopi", "stock": 10 }`
    - Jika `name` atau `stock` kosong, kembalikan status `400 Bad Request` dengan pesan error: "Nama dan stok harus diisi".
    - Jika berhasil, tambahkan ID otomatis (misal berdasarkan panjang array), masukkan ke array, dan kembalikan data baru tersebut dengan status `201 Created`.

4.  **Mencari Kopi yang Masih Ada (GET dengan Filter):**
    - Modifikasi endpoint `GET /api/inventory` agar menerima Query String: `?available=true`.
    - Jika `?available=true` dikirimkan, API HANYA mengembalikan kopi yang stoknya lebih dari 0 (> 0).
    - Jika tidak ada query string, kembalikan semua data seperti biasa.

---
*Tantangan Live Coding: Cobalah kerjakan dalam 1 file `index.js` (atau nama lain) kurang dari 15 menit. Anda dapat mengetesnya menggunakan Postman, Thunder Client, atau CURL.*

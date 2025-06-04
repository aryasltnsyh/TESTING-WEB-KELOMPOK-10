## 1. Insert Barang

---
### a. Deskripsi Fungsional
Form ini menangani proses penambahan barang baru. Ketika form dikirim (submit), data dari $_POST dikirim ke fungsi add_produk() untuk ditambahkan ke database. Terdapat umpan balik berupa alert dan redirect.

### b. Logika Utama
![](add_produk.png) 

### c. Flowchart
Mulai
  │
  ├─> Apakah $_POST['submit'] ada?
  │     │
  │     ├─> Ya
  │     │     └─> Panggil add_produk($_POST)
  │     │            │
  │     │            ├─> Return > 0?
  │     │            │     ├─> Ya: Tampilkan alert "Berhasil", redirect
  │     │            │     └─> Tidak: Tampilkan alert "Gagal", redirect
  │     │
  │     └─> Tidak → Lewati proses
  │
Selesai

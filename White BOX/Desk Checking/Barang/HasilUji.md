## 1. Insert Barang

---
### a. Deskripsi Fungsional
Fitur ini digunakan untuk menambahkan produk baru melalui form input. Data yang dikirim oleh user akan diproses oleh fungsi `add_produk()` yang bertugas menyimpan ke database setelah memvalidasi bahwa `nama_kategori` yang dipilih valid (tersedia di tabel `kategori`).


### b. Logika Insert & Fungsi
| ![](insert.png) | ![](add_produk.png) |
|------------------|---------------------|


### c. Alur Logika Gabungan
```
graph TD
    A(Mulai - User Isi Form) --> B[Klik Submit]
    B --> C[insert/index.php: Cek isset($_POST['submit'])]
    C --> D[add_produk($_POST)]
    D --> E{Kategori valid?}
    E -- Ya --> F[Ambil id_kategori]
    F --> G[Insert data produk]
    G --> H{Insert sukses?}
    H -- Ya --> I[Alert sukses + redirect]
    H -- Tidak --> J[Alert gagal + redirect]
    E -- Tidak --> K[Return 0 → Alert gagal + redirect]
```

### c. Test Case (UI + Backend)
| TC | Submit? | Nama Kategori Valid? | Insert DB Berhasil? | Expected Output                      |
| -- | ------- | -------------------- | ------------------- | ------------------------------------ |
| 1  | ❌ Tidak | -                    | -                   | Tidak terjadi apa-apa                |
| 2  | ✅ Ya    | ❌ Tidak valid        | ❌ Tidak jalan       | Alert "Gagal menambahkan produk!"    |
| 3  | ✅ Ya    | ✅ Ya                 | ✅ Berhasil          | Alert "Berhasil menambahkan produk!" |




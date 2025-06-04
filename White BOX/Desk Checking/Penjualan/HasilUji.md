## 1. Penjualan / Kasir

---
### a. Deskripsi Fungsional
Memiliki 3 fungsi:
- Menambahkan barang ke dalam daftar transaksi (tabel kasir)
- Melakukan proses pembayaran dan mencatat transaksi ke tabel nota serta mengurangi stok
- Menghapus seluruh data transaksi kasir




### b. Logika Insert & Fungsi
| ![](nota.png) | ![](function_nota.png) |
|------------------|---------------------|
- getProduk() menampilkan semua produk dari database.
- Jika tombol input_barang diklik:
  - Ambil id_barang dan jumlah
  - Ambil harga_jual dari produk
  - Hitung total
  - Tambah/update data di tabel kasir
- Jika tombol bayar diklik:
  - Ambil bayar (jumlah uang dari user)
  - Hitung kembalian (uang kembali)
  - Jika cukup: simpan ke nota, kurangi stok, dan hapus data kasir
  - Jika tidak: tampilkan alert gagal
- Jika tombol clear diklik:
  - Hapus seluruh data dari kasir

    
### c. Alur Logika Gabungan
```
graph TD
    A(Halaman Kasir Dibuka) --> B[Ambil semua produk]
    B --> C{Form input_barang disubmit?}
    C -- Ya --> D[Ambil id_barang & jumlah]
    D --> E[Ambil harga_jual dari produk]
    E --> F[Hitung total = harga * jumlah]
    F --> G[Cek data kasir, update atau insert]
    G --> B

    C -- Tidak --> H{Tombol Bayar diklik?}
    H -- Ya --> I[Ambil input bayar]
    I --> J[Hitung total kasir]
    J --> K{Cukup?}
    K -- Ya --> L[Masukkan ke nota]
    L --> M[Kurangi stok produk]
    M --> N[Hapus data kasir]
    N --> O[Tampilkan alert kembalian]

    K -- Tidak --> P[Alert: Tidak cukup]
    H -- Tidak --> Q{Tombol Clear diklik?}
    Q -- Ya --> R[Hapus semua data kasir]

```

### d. Test Case 
### Input Barang
| TC | `id_barang` Valid? | `jumlah` Valid? | Output                               | Catatan                  |
| -- | ------------------ | --------------- | ------------------------------------ | ------------------------ |
| 1  | ✅ Ya               | ✅ Ya            | Data ditambahkan/diupdate ke `kasir` | Normal                   |
| 2  | ❌ Tidak            | ✅ Ya            | Gagal silent / error dari DB         | Harus validasi ID        |
| 3  | ✅ Ya               | ❌ (negatif)     | Total bisa negatif / error logika    | Tidak divalidasi negatif |
| 4  | Kosong             | ✅ Ya            | Tidak terjadi input                  | Butuh validasi wajib isi |
| 5  | ✅ Ya               | Kosong/null     | Gagal / error perhitungan            | `jumlah * harga` gagal   |

### Proses Pembayaran
| TC | `bayar` Valid? | Total Harga Ada?      | Output                                              | Catatan                              |
| -- | -------------- | --------------------- | --------------------------------------------------- | ------------------------------------ |
| 1  | ✅ Cukup        | ✅ Ada                 | Nota masuk, stok dikurangi, kasir dikosongkan       | Normal                               |
| 2  | ✅ Kurang       | ✅ Ada                 | Alert "Jumlah pembayaran tidak mencukupi"           | Tidak memproses                      |
| 3  | ❌ Bukan angka  | ✅ Ada                 | Alert: "Input pembayaran harus berupa angka."       | Aman, ada validasi angka             |
| 4  | Kosong/null    | ✅ Ada                 | Alert sama seperti TC 3                             | Aman                                 |
| 5  | ✅ Ya           | ❌ Tidak ada transaksi | Total = 0, semua tetap jalan tapi kembalian = bayar | Perlu validasi jika transaksi kosong |


### Clear Data Kasir
| TC | Tombol Clear Klik? | Output                   | Catatan         |
| -- | ------------------ | ------------------------ | --------------- |
| 1  | ✅ Ya               | Semua data kasir dihapus | Normal          |
| 2  | ❌ Tidak            | Tidak ada aksi           | Tidak berdampak |



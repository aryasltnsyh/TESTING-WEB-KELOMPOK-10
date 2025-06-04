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
graph TD
    A(Halaman Kasir Dibuka) --> B[Ambil daftar produk untuk dropdown]
    B --> C{Form input_barang disubmit?}
    C -- Ya --> D[Ambil nama_barang & jumlah]
    D --> E{Nama barang dipilih (tidak kosong)?}
    E -- Tidak --> F[Tampilkan alert: Pilih nama barang]
    E -- Ya --> G[Cari produk berdasarkan nama_barang]
    G --> H{Produk ditemukan?}
    H -- Tidak --> I[Tampilkan alert: Produk tidak ditemukan]
    H -- Ya --> J[Ambil id_barang dan harga_jual]
    J --> K[Hitung total = harga_jual × jumlah]
    K --> L[INSERT/UPDATE data ke tabel kasir]
    L --> M[Selesai]

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
| TC | Nama Barang Dipilih | Jumlah | Output                                                 | 
| -- | ------------------- | ------ | ------------------------------------------------------ | 
| 1  | ✅                  | 2      | Data berhasil masuk/update ke kasir dengan total benar | 
| 2  | ✅                  | -1     | Data masuk, total bisa negatif                         | 
| 4  | ✅                  | 0      | alert "field harus di isi"                             |      
| 5  | ✅ "Beras"           | "abc"  | Tidak muncul di field "jumla                           |


### Proses Pembayaran
| TC | `bayar` Valid? | Total Harga Ada?      | Output                                              | Catatan                              |
| -- | -------------- | --------------------- | --------------------------------------------------- | ------------------------------------ |
| 1  | ✅ Cukup        | ✅ Ada                 | Nota masuk, stok dikurangi, kasir dikosongkan       | Normal                               |
| 2  | ✅ Kurang       | ✅ Ada                 | Alert "Jumlah pembayaran tidak mencukupi"           | Tidak memproses                      |
| 3  | ❌ Bukan angka  | ✅ Ada                 | Tidak muncul di field                               | Hanya angka saja yang bisa           |
| 4  | Kosong/null    | ✅ Ada                 | Tidak ada respon apapun                               | Aman                                 |
| 5  | ✅ Ya           | ❌ Tidak ada transaksi | Total = 0, semua tetap jalan tapi kembalian = bayar | Perlu validasi jika transaksi kosong |


### Clear Data Kasir
| TC | Tombol Clear Klik? | Output                   | Catatan         |
| -- | ------------------ | ------------------------ | --------------- |
| 1  | ✅ Ya               | Semua data kasir dihapus | Normal          |
| 2  | ❌ Tidak            | Tidak ada aksi           | Tidak berdampak |



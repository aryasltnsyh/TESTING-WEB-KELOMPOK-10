# BOUNDARY VALUE ANALYSIS – PENJUALAN
---
| Field       | Validasi Panjang/Range   | Nilai Batas Valid     | Nilai Batas Invalid            |
| ----------- | ------------------------ | --------------------- | ------------------------------ |
| Jumlah      | Minimal 1, Maksimum stok | 1 → ✅, stok = 100 → ✅ | 0 → ❌, 101 (melebihi stok) → ❌ |
| Jumlah Uang | ≥ Total Harga            | = Total Harga → ✅     | < Total Harga → ❌              |
---
# EQUIVALENCE PARTITIONING – PENJUALAN
---
| Field       | Kelas Valid                    | Kelas Invalid                             |
| ----------- | ------------------------------ | ----------------------------------------- |
| Nama Barang | Pilihan tersedia               | Tidak memilih barang (kosong)             |
| Jumlah      | Angka positif, ≤ stok tersedia | Kosong, angka 0, negatif, melebihi stok   |
| Jumlah Uang | Angka ≥ total harga            | Angka < total harga, kosong, huruf/simbol |

# Test case
---
| TC ID     | Deskripsi                                           | Input                                           | Expected Result                                      | Actual Result               | Status Uji |
|-----------|-----------------------------------------------------|--------------------------------------------------|-------------------------------------------------------|-----------------------------|------------|
| TC_PJL_01 | Tambah barang valid ke keranjang                    | Barang: "panadol", Jumlah: 2                   | Barang masuk ke keranjang, total harga dihitung      | Sesuai                      | ✅         |
| TC_PJL_02 | Tidak pilih barang                                  | Barang: (kosong), Jumlah: 2                    | Validasi: "Pilih barang terlebih dahulu"              | Validasi muncul             | ✅         |
| TC_PJL_03 | Jumlah kosong                                       | Barang: "panadol", Jumlah: (kosong)            | Validasi: "Jumlah wajib diisi"                        | Validasi muncul             | ✅         |
| TC_PJL_04 | Jumlah 0 (invalid)                                  | Barang: "Panadol", Jumlah: 0                   | Validasi: "Jumlah minimal 1"                          | Data dimasukan ke keranjang             | ❌         |
| TC_PJL_05 | Jumlah melebihi stok                                | Barang: "Oskadon" (stok=5), Jumlah: 6        | Validasi: "Jumlah melebihi stok tersedia"            | ata dimasukan ke keranjang             | ❌         |
| TC_PJL_06 | Tambah 2 item, total otomatis                       | "Panadol x2", "Oskadon x1"                   | Total = (harga panadol × 2) + (harga oskadon × 1)         | Total sesuai                | ✅         |
| TC_PJL_07 | Jumlah uang pas                                     | Total: 15.000, Uang: 15.000                    | Transaksi berhasil, tidak ada kembalian               | Pesan sukses muncul          | ✅         |
| TC_PJL_08 | Jumlah uang lebih (ada kembalian)                   | Total: 15.000, Uang: 20.000                    | Transaksi berhasil, kembalian: 5.000                  | Pesan kembalian muncul       | ✅         |
| TC_PJL_09 | Jumlah uang kurang                                  | Total: 15.000, Uang: 10.000                    | Validasi: "Uang tidak mencukupi"                          | Validasi muncul             | ✅         |
| TC_PJL_10 | Uang kosong                                         | Total: 15.000, Uang: (kosong)                  | Validasi: "Jumlah uang wajib diisi"                   | Tidak muncul apa apa             | ❌         |
| TC_PJL_11 | Uang mengandung huruf/simbol                        | Total: 15.000, Uang: "10rb@"                   | Validasi: "Masukkan angka yang valid"                 | Validasi muncul             | ✅         |
| TC_PJL_12 | Hapus item dari keranjang                           | Klik ikon hapus di "Indomie x2"                | Item dihapus dari keranjang, total harga terupdate   | Item tidak bisa dihapus               | ❌         |
| TC_PJL_13 | Reset semua isi keranjang                           | Klik tombol "Clear"                            | Keranjang kosong, total harga = 0                     | Keranjang kosong            | ✅         |
| TC_PJL_14 | Tambah barang tanpa menekan "Tambah ke Kasir"       | Pilih "Teh Botol", jumlah 1, tapi tidak klik   | Tidak terjadi apa-apa                                | Tidak masuk keranjang       | ✅         |

# Behavior Testing
---
| TC ID     | Deskripsi                                       | Langkah Uji                                                                          | Expected Result                                             | Actual Result              | Status Uji |
|-----------|-------------------------------------------------|--------------------------------------------------------------------------------------|--------------------------------------------------------------|----------------------------|------------|
| TC_PJ_01  | Tambah barang ke keranjang dengan jumlah valid  | Pilih "paramex" → jumlah: 2 → klik Tambah ke Kasir                                    | Barang masuk keranjang, total harga dihitung                 | Barang masuk & total OK    | ✅         |
| TC_PJ_02  | Jumlah barang kosong                            | Pilih barang → jumlah: kosong → klik Tambah ke Kasir                               | Validasi muncul: "Jumlah wajib diisi"                        | Validasi muncul             | ✅         |
| TC_PJ_03  | Jumlah melebihi stok                            | Pilih barang stok=10 → jumlah: 11 → klik Tambah                                    | Validasi muncul: "Jumlah melebihi stok"                      | Data dimasukan ke keranjang             | ❌         |
| TC_PJ_04  | Tambah beberapa item lalu cek total             | Tambah "paramex x2", "panadol x3" → total harga dihitung                                 | Total = (harga paramex ×2 + harga promag ×3)                        | Total sesuai perhitungan    | ✅         |
| TC_PJ_05  | Jumlah uang cukup                               | Total harga: 15000 → masukkan uang: 20000                                           | Transaksi berhasil, pesan kembalian: "Kembalian: 5000"       | Pesan muncul sesuai          | ✅         |
| TC_PJ_06  | Jumlah uang pas                                 | Total harga: 15000 → uang: 15000                                                    | Transaksi berhasil, pesan: "Transaksi berhasil, kembalian 0 | Pesan sesuai    | ✅         |
| TC_PJ_07  | Jumlah uang kurang                              | Total: 15000 → uang: 10000                                                          | Validasi: "Uang tidak cukup"                                 | Validasi muncul             | ✅         |
| TC_PJ_08  | Jumlah uang kosong                              | Uang kosong → klik Bayar                                                             | Validasi muncul: "Jumlah uang wajib diisi"                   | Validasi muncul             | ✅         |
| TC_PJ_09  | Reset atau hapus isi keranjang                  | Tambah barang → klik "clear" atau "Hapus Semua"                                     | Keranjang kosong, total harga kembali 0                      | Berhasil direset             | ✅         |
| TC_PJ_10  | Uang mengandung huruf/simbol                    | Input uang: "12rb@" → klik Bayar                                                    | Validasi: "Masukkan angka yang valid"                        | Validasi muncul             | ✅         |

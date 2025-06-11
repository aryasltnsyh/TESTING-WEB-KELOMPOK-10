# REKAP BUG YANG DITEMUKAN
---
| No | Fitur       | ID Test Case | Deskripsi Bug                                                               | Penyebab Kemungkinan                          | Status |
| -- | ----------- | ------------ | --------------------------------------------------------------------------- | --------------------------------------------- | ------ |
| 1  | Data Barang | TC\_BR\_05   | Harga beli lebih besar dari harga jual tetap disimpan                       | Tidak ada validasi hubungan harga beli > jual | ❌ Bug  |
| 2  | Data Barang | TC\_BR\_06   | Input huruf pada stok diterima                                              | Validasi tipe data angka tidak diterapkan     | ❌ Bug  |
| 3  | Kategori    | TC\_KTG\_03  | Input angka atau simbol untuk nama kategori tetap diterima                  | Tidak ada validasi karakter huruf saja        | ❌ Bug  |
| 4  | Penjualan   | TC\_PJL\_05  | Jumlah melebihi stok tetap bisa ditambahkan ke keranjang                    | Tidak ada pengecekan terhadap stok tersedia   | ❌ Bug  |
| 5  | Penjualan   | TC\_PJL\_09  | Uang kurang tapi transaksi tetap diproses                                   | Validasi nominal uang tidak dijalankan        | ❌ Bug  |
| 6  | Penjualan   | TC\_PJL\_11  | Input uang mengandung huruf tetap diproses                                  | Validasi tipe input uang tidak ketat          | ❌ Bug  |
| 7  | Laporan     | TC\_LP\_03   | Tanggal awal lebih besar dari tanggal akhir tetap memunculkan hasil laporan | Tidak ada pengecekan logika tanggal           | ❌ Bug  |
| 8  | Laporan     | TC\_LP\_05   | Format tanggal salah tapi tidak divalidasi                                  | Validasi format tanggal tidak diterapkan      | ❌ Bug  |


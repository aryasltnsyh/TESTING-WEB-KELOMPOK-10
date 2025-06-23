# Tabel Hasil Pengujian (OAT) – Tambah Barang #

| Test Case | Nama Kategori    | Nama Barang     | Stok         | Harga Jual     | Harga Beli     | Hasil yang Diharapkan                              | Hasil Aktual          | Status     |
|-----------|------------------|------------------|--------------|----------------|----------------|----------------------------------------------------|------------------------|------------|
| 1         | Valid            | Valid            | Angka Valid  | Angka Valid    | Angka Valid    | Data berhasil disimpan                             | Sesuai                 | ✅ Lulus    |
| 2         | Valid            | Valid            | Kosong       | Huruf          | Kosong         | Validasi error pada stok, harga jual & beli        | Muncul error           | ✅ Lulus    |
| 3         | Valid            | Sangat Panjang   | Negatif      | Negatif        | Angka Valid    | Validasi error pada nama, stok, harga jual         | Muncul error           | ✅ Lulus    |
| 4         | Kosong           | Valid            | Negatif      | Angka Valid    | Negatif        | Validasi error pada kategori, stok, harga beli     | Muncul error           | ✅ Lulus    |
| 5         | Kosong           | Kosong           | Angka Valid  | Huruf          | Kosong         | Validasi error pada kategori, nama, harga jual & beli | Muncul error        | ✅ Lulus    |
| 6         | Kosong           | Sangat Panjang   | Kosong       | Negatif        | Negatif        | Validasi error banyak field                        | Muncul error           | ✅ Lulus    |
| 7         | Simbol/Karakter  | Valid            | Angka Valid  | Negatif        | Angka Valid    | Validasi error pada kategori & harga jual          | Muncul error           | ✅ Lulus    |
| 8         | Simbol/Karakter  | Kosong           | Kosong       | Huruf          | Kosong         | Validasi error semua input                         | Muncul error           | ✅ Lulus    |
| 9         | Simbol/Karakter  | Sangat Panjang   | Negatif      | Angka Valid    | Huruf          | Validasi error pada kategori, stok, harga beli     | Muncul error           | ✅ Lulus    |


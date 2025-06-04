# Orthogonal Array Testing (OAT) - Transaksi Penjualan

| **TC ID** | **Nama Barang** | **Jumlah** | **Bayar** | **Expected Result** |
|----------|------------------|------------|-----------|------------------------------------|
| TC 1     | Valid            | 1          | Cukup     | Transaksi berhasil |
| TC 2     | Valid            | 0          | Kurang    | Error: Jumlah minimal 1 (sistem masih memasukkan ke keranjang - bug) |
| TC 3     | Valid            | (kosong)   | Kosong    | Error: Jumlah wajib diisi & Bayar wajib diisi |
| TC 4     | (kosong)         | 1          | Kurang    | Error: Pilih barang terlebih dahulu & Uang tidak mencukupi |
| TC 5     | (kosong)         | (kosong)   | Kosong    | Error: Pilih barang, jumlah & bayar wajib diisi |
| TC 6     | (kosong)         | -5         | Cukup     | Error: Nama barang wajib diisi & Jumlah tidak boleh negatif |
| TC 7     | Simbol saja      | 1          | Kosong    | Error: Nama barang tidak valid & Bayar wajib diisi |
| TC 8     | Simbol saja      | 0          | Cukup     | Error: Nama barang tidak valid & Jumlah minimal 1 |
| TC 9     | Simbol saja      | -5         | Kurang    | Error: Nama barang tidak valid, jumlah negatif & uang tidak mencukupi |

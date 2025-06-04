## 1. Get Produk
```php
function getProduk()
{
    global $conn;

    $query = "SELECT * FROM produk";
    $result = mysqli_query($conn, $query);

    $produk = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $produk[] = $row;
    }

    return $produk;
}
```
| Kondisi Yang Diuji                     | Hasil Yang Diharapkan                        | Hasil Aktual                   | Status   |
| -------------------------------------- | -------------------------------------------- | ------------------------------ | -------- |
| Data produk tersedia di tabel `produk` | Mengembalikan array isi produk               | Sesuai                         | ✅        |
| Tabel `produk` kosong                  | Mengembalikan array kosong                   | Sesuai                         | ✅        |
| Query gagal (misal koneksi DB putus)   | Error atau `false` pada `mysqli_fetch_assoc` | Sesuai/tergantung implementasi | ✅ / ⚠️\* |
---

## 2. getProdukById($id_barang)
```php
function getProdukById($id_barang)
{
    global $conn;

    $query = "SELECT * FROM produk WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row;
}
```
| Kondisi Yang Diuji                                | Hasil Yang Diharapkan                  | Hasil Aktual            | Status |
| ------------------------------------------------- | -------------------------------------- | ----------------------- | ------ |
| `id_barang` sesuai dengan data di DB              | Mengembalikan 1 array produk           | Sesuai                  | ✅      |
| `id_barang` tidak ditemukan di tabel `produk`     | Mengembalikan `null`                   | Sesuai                  | ✅      |
| Query gagal (misal koneksi putus / kesalahan SQL) | Kemungkinan `mysqli_fetch_assoc` error | Tergantung implementasi | ⚠️     |
---

## 3. inputBarangKasir($id_barang, $jumlah, $total)
```php
function inputBarangKasir($id_barang, $jumlah, $total)
{
    global $conn;

    // Cek apakah barang sudah ada di tabel kasir
    $query = "SELECT COUNT(*) as count FROM kasir WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        // Jika barang sudah ada, update jumlah dan total
        $query = "UPDATE kasir SET jumlah = jumlah + $jumlah, total = total + '$total' WHERE id_barang = '$id_barang'";
    } else {
        // Jika barang belum ada, lakukan operasi INSERT
        $query = "INSERT INTO kasir (id_barang, jumlah, total, tgl_input) VALUES ('$id_barang', $jumlah, $total, NOW())";
    }

    mysqli_query($conn, $query);
}
```
| Kondisi Yang Diuji                            | Hasil Yang Diharapkan                                         | Hasil Aktual | Status |
| --------------------------------------------- | ------------------------------------------------------------- | ------------ | ------ |
| Barang sudah ada di tabel `kasir` (count > 0) | Query UPDATE jumlah dan total dilakukan pada barang yang sama | Sesuai       | ✅      |
| Barang belum ada di tabel `kasir` (count = 0) | Query INSERT data barang baru ke tabel `kasir`                | Sesuai       | ✅      |
| Query SELECT COUNT gagal                      | Berpotensi error / query UPDATE atau INSERT tidak dijalankan  | ⚠️           | ⚠️     |
| Query UPDATE atau INSERT gagal                | Error tidak ditangani                                         | ⚠️           | ⚠️     |
---

## 4. function hitungKembalian($bayar)
```php
function hitungKembalian($bayar)
{
    global $conn;

    $query = "SELECT SUM(total) AS total FROM kasir";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $total = $row['total'];

    // Validasi input adalah angka
    if (is_numeric($bayar)) {
        $kembalian = $bayar - $total;
        return $kembalian;
    } else {
        return "Input pembayaran harus berupa angka.";
    }
}
```
| Kondisi Yang Diuji                            | Hasil Yang Diharapkan                                       | Hasil Aktual | Status |
| --------------------------------------------- | ----------------------------------------------------------- | ------------ | ------ |
| Query SELECT SUM(total) sukses                | Total dari tabel `kasir` berhasil didapatkan                | Sesuai       | ✅      |
| Query SELECT SUM(total) gagal                 | `mysqli_fetch_assoc` mungkin error / `total` null           | ⚠️           | ⚠️     |
| `$bayar` adalah angka                         | Menghitung kembalian `bayar - total` dan return             | Sesuai       | ✅      |
| `$bayar` bukan angka (misal string non-digit) | Return pesan error `"Input pembayaran harus berupa angka."` | Sesuai       | ✅      |
---

## 5. function masukkanDataNota()
```php
function masukkanDataNota()
{
    global $conn;

    $query = "INSERT INTO nota (id_barang, jumlah, total, tgl_input) SELECT id_barang, jumlah, total, tgl_input FROM kasir";
    mysqli_query($conn, $query);
}
```
| Kondisi Yang Diuji                                | Hasil Yang Diharapkan                                     | Hasil Aktual | Status |
| ------------------------------------------------- | --------------------------------------------------------- | ------------ | ------ |
| Data pada tabel `kasir` ada                       | Data berhasil disalin ke tabel `nota`                     | Sesuai       | ✅      |
| Data pada tabel `kasir` kosong                    | Query tetap berjalan, tapi tidak ada data yang dimasukkan | Sesuai       | ✅      |
| Query INSERT gagal (misal koneksi error/db error) | Tidak ada penanganan error, kemungkinan gagal diam-diam   | ⚠️           | ⚠️     |
---

## 6. function clearDataKasir()
```php
function clearDataKasir()
{
    global $conn;

    $query = "DELETE FROM kasir";
    mysqli_query($conn, $query);
}

```
| Kondisi Yang Diuji                          | Hasil Yang Diharapkan                       | Hasil Aktual | Status |
| ------------------------------------------- | ------------------------------------------- | ------------ | ------ |
| Data di tabel `kasir` ada                   | Semua data berhasil dihapus                 | Sesuai       | ✅      |
| Tabel `kasir` sudah kosong                  | Query tetap jalan tanpa error               | Sesuai       | ✅      |
| Query DELETE gagal (misal error koneksi/db) | Tidak ada penanganan error, gagal diam-diam | ⚠️           | ⚠️     |
---

## 7. function getDataKasir()
```php
function getDataKasir()
{
    global $conn;

    $query = "SELECT * FROM kasir";
    $result = mysqli_query($conn, $query);

    $kasir = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $kasir[] = $row;
    }

    return $kasir;
}
```
| Kondisi Yang Diuji        | Hasil Yang Diharapkan                                                             | Hasil Aktual | Status |
| ------------------------- | --------------------------------------------------------------------------------- | ------------ | ------ |
| Tabel `kasir` berisi data | Mengembalikan array berisi data semua baris dari `kasir`                          | Sesuai       | ✅      |
| Tabel `kasir` kosong      | Mengembalikan array kosong                                                        | Sesuai       | ✅      |
| Query SELECT gagal        | Fungsi tetap jalan tapi `$result` kemungkinan `false`, `mysqli_fetch_assoc` error | ⚠️           | ⚠️     |
---

## 8. function hitungTotalHarga()
```php
function hitungTotalHarga()
{
    global $conn;

    $query = "SELECT SUM(total) AS total_harga FROM kasir";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['total_harga'];
}
```
| Kondisi Yang Diuji                          | Hasil Yang Diharapkan                                                            | Hasil Aktual | Status |
| ------------------------------------------- | -------------------------------------------------------------------------------- | ------------ | ------ |
| Tabel `kasir` berisi data                   | Mengembalikan jumlah total harga dari semua row                                  | Sesuai       | ✅      |
| Tabel `kasir` kosong                        | Mengembalikan `NULL` atau `0` (tergantung DB)                                    | Sesuai       | ✅      |
| Query SELECT gagal (misal koneksi/db error) | Fungsi error atau mengembalikan nilai kosong (karena tidak ada pengecekan error) | ⚠️           | ⚠️     |
---

## 9. function hitungTotalHarga()
```php
function kurangiStokBarang()
{
    global $conn;

    $query = "SELECT id_barang, jumlah FROM kasir";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id_barang = $row['id_barang'];
        $jumlah = $row['jumlah'];

        $query_update_stok = "UPDATE produk SET stok = stok - $jumlah WHERE id_barang = '$id_barang'";
        mysqli_query($conn, $query_update_stok);
    }
}
```
| Kondisi Yang Diuji                               | Hasil Yang Diharapkan                                                | Hasil Aktual | Status |
| ------------------------------------------------ | -------------------------------------------------------------------- | ------------ | ------ |
| Tabel `kasir` berisi data                        | Melakukan update stok produk sesuai dengan jumlah barang yang dibeli | Sesuai       | ✅      |
| Tabel `kasir` kosong                             | Loop tidak berjalan, tidak ada query update yang dijalankan          | Sesuai       | ✅      |
| Query SELECT gagal (misal error koneksi/db)      | Fungsi error atau loop tidak berjalan karena `$result` false         | ⚠️           | ⚠️     |
| Query UPDATE gagal (misal stok kurang, error DB) | Tidak ada penanganan error, kegagalan tidak terdeteksi               | ⚠️           | ⚠️     |





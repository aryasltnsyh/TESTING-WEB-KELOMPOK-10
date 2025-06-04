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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT * FROM produk
  |
(3) Inisialisasi array $produk
  |
[Apakah hasil query memiliki baris?]
     |            \
    ya             tidak
     |               \
(4) Loop fetch row   (5) Lewati loop
     |                   |
     v                   v
(6) Tambah ke array   (7) Return array kosong
  |
(8) Return array $produk
```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT * WHERE id_barang = ?
  |
(3) Ambil hasil 1 baris dari query
  |
(4) Return $row (hasil fetch atau null)
```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan SELECT COUNT(*) FROM kasir WHERE id_barang = ?
  |
[Apakah count > 0?]
   |           \
  ya            tidak
   |              \
(3) Jalankan UPDATE   (4) Jalankan INSERT
  |                   |
(5) Selesai          (5) Selesai

```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT SUM(total) AS total FROM kasir
  |
(3) Ambil total dari hasil query
  |
(4) Cek apakah $bayar adalah angka?
  |         \
 ya          tidak
  |           \
(5) Hitung kembalian = bayar - total (return hasil)
  |           
(6) Return pesan error "Input pembayaran harus berupa angka."

```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query INSERT INTO nota SELECT

```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query DELETE FROM kasir
  |
(3) Selesai

```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT * FROM kasir
  |
(3) Jika data ada, lakukan loop fetch_assoc untuk setiap baris
  |
(4) Simpan data ke array $kasir
  |
(5) Return array $kasir
  |
(6) Selesai

```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT SUM(total) AS total_harga FROM kasir
  |
(3) Ambil hasil query
  |
(4) Return total_harga
  |
(5) Selesai
```
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
### Flow Diagram
```
(1) Mulai
  |
(2) Jalankan query SELECT id_barang, jumlah FROM kasir
  |
(3) Jika ada data, lakukan loop fetch setiap baris
  |
(4) Jalankan query UPDATE produk untuk mengurangi stok sesuai jumlah
  |
(5) Ulangi sampai semua baris selesai
  |
(6) Selesai

```





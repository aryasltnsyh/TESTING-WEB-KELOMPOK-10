## 1. Insert Barang
```php
function add_produk($add_produk)
{
    global $conn;

    // ambil data dari form insert

    $nama_kategori = $add_produk["nama_kategori"];
    $nama_barang = $add_produk["nama_barang"];
    $stok = $add_produk["stok"];
    $harga_jual = $add_produk["harga_jual"];
    $harga_beli = $add_produk["harga_beli"];

    // cek apakah nama_kategori ada dalam tabel kategori
    $query_cek_kategori = "SELECT id_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'";
    $result_cek_kategori = mysqli_query($conn, $query_cek_kategori);


    if (mysqli_num_rows($result_cek_kategori) > 0) {
        // ambil id_kategori berdasarkan nama_kategori
        $row_kategori = mysqli_fetch_assoc($result_cek_kategori);
        $id_kategori = $row_kategori["id_kategori"];

        // query insert data
        $query = "INSERT INTO produk (id_kategori, nama_barang, stok, harga_jual, harga_beli) VALUES ('$id_kategori', '$nama_barang', '$stok', '$harga_jual', '$harga_beli')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    } else {
        // kategori tidak ditemukan, lakukan penanganan error sesuai kebutuhan
        // throw new Exception("Kategori tidak valid");
        // atau: return 0;
    }
}
```
### Flow Diagram
```
(1) Mulai
  |
  v
(2) Ambil input dari form ($_POST)
  |
  v
(3) Jalankan query cek kategori (kategori valid dari dropdown)
  |
  v
(4) Ambil id_kategori
  |
  v
(5) Insert produk ke DB
  |
  v
(6) return hasil insert
```


---
## 2. Edit Barang
```php
function edit_produk($edit)
{
    global $conn;

    //ambil data dari form edit
    $id_barang = $edit["id_barang"];
    $nama_barang = $edit["nama_barang"];
    $stok = $edit["stok"];
    $harga_jual = $edit["harga_jual"];
    $harga_beli = $edit["harga_beli"];

    //query insert data

    $query = "UPDATE produk SET nama_barang='$nama_barang', stok='$stok', harga_jual='$harga_jual', harga_beli='$harga_beli' WHERE id_barang='$id_barang'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
```
### Flow Diagram
```
(1) Mulai
  |
  v
(2) Ambil input dari form
  |
  v
(3) Eksekusi query UPDATE produk
  |
  v
[Apakah query berhasil?]
  |             \
  |              v
  |         (4) Query gagal → return 0
  v
(5) Cek apakah ada baris berubah?
  |             \
  |              v
  |         (6) Tidak ada baris berubah → return 0
  v
(7) return jumlah baris terpengaruh (> 0)
```
---

## 3. Delete Barang
```php
<?php
// Periksa apakah ada parameter ID yang diterima
if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Query SQL untuk menghapus data produk berdasarkan id_barang
    $sql = "DELETE FROM produk WHERE id_barang = '$id_barang'";
    $result = $conn->query($sql);
    echo "<script>
    window.location.href= 'index.php?page=barang';
    </script>";
}
?>
```
### Flow Diagram
```
(1) Mulai
  |
[Apakah $_GET['id_barang'] diset?]
  |                 \
  |                  v
  |              (2) Tidak diset → End
  v
(3) Ambil id_barang dari $_GET
  |
  v
(4) Eksekusi query DELETE
  |
[Apakah query berhasil?]
  |             \
  |              v
  |         (5) Query gagal → End
  v
(6) Redirect ke halaman barang

```

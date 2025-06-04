## 1. Insert Kategori
```php
function add_kategori($add_kategori)
{
    global $conn;
    // ambil data dari form insert
    $nama_kategori = $add_kategori["nama_kategori"];

    $query = "INSERT INTO kategori (nama_kategori, tanggal_input) values ('$nama_kategori', now())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
```
### Flow Diagram
```
(1) Mulai
  |
  v
(2) Ambil input nama_kategori dari form
  |
  v
(3) Jalankan query INSERT ke tabel kategori
  |
[Apakah query berhasil?]
  |                \
  |                 v
  |            (4) return 0 (insert gagal)
  v
(5) return jumlah baris terpengaruh (> 0)

```


---
## 2. Edit Kategori
```php
function edit_kategori($editK)
{
    global $conn;

    // ambil data dari form edit kategori
    $id_kategori = $editK["id_kategori"];
    $nama_kategori = $editK["nama_kategori"];


    $query = "UPDATE kategori SET nama_kategori='$nama_kategori', tanggal_input= NOW() WHERE id_kategori='$id_kategori'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
```
### Flow Diagram
```
(1) Mulai
  |
  v
(2) Ambil id_kategori & nama_kategori dari form
  |
  v
(3) Jalankan query UPDATE ke tabel kategori
  |
[Apakah query berhasil dan data berubah?]
  |             \
  |              v
  |        (4) return 0 (gagal/tidak ada perubahan)
  v
(5) return jumlah baris terpengaruh (> 0)

```
---

## 3. Delete Kategori
```php
<?php
// Periksa apakah ada parameter ID yang diterima
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Query SQL untuk menghapus data kategori berdasarkan id_kategori
    $sql = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
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
[Apakah $_GET['id_kategori'] diset?]
  |                \
  |                 v
  |             (2) Selesai (tidak melakukan apa-apa)
  v
(3) Ambil id_kategori
  |
(4) Jalankan query DELETE kategori
  |
(5) Redirect ke halaman barang


```

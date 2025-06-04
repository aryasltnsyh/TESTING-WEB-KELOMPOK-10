## 1. Fungsi Laporan / Nota
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
(2) Jalankan query SELECT * FROM produk WHERE id_barang = '$id_barang'
  |
(3) Ambil baris hasil query (jika ada)
  |
(4) Return hasil (array data produk atau null)
  |
(5) Selesai

```


---

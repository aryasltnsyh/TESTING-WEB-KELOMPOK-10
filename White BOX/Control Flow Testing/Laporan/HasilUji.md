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

| Kondisi Yang Diuji                                 | Hasil Yang Diharapkan                                                                         | Hasil Aktual | Status |
| -------------------------------------------------- | --------------------------------------------------------------------------------------------- | ------------ | ------ |
| `id_barang` ada dan valid                          | Mengembalikan array data produk sesuai `id_barang`                                            | Sesuai       | ✅      |
| `id_barang` tidak ditemukan di tabel produk        | Mengembalikan `null` (karena tidak ada data)                                                  | Sesuai       | ✅      |
| Query gagal (misal error koneksi/db)               | Fungsi error atau mengembalikan `null` (karena tidak ada pengecekan error)                    | ⚠️           | ⚠️     |
| `id_barang` kosong atau tidak valid (misal kosong) | Query tetap dijalankan tapi hasil kemungkinan `null` atau error SQL tergantung validasi input | ⚠️           | ⚠️     |

---

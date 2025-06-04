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

| Kondisi Yang Diuji                                                      | Hasil Yang Diharapkan                                                            | Hasil Aktual | Status |
| ----------------------------------------------------------------------- | -------------------------------------------------------------------------------- | ------------ | ------ |
| Fungsi `add_produk()` dipanggil                                         | Fungsi mengeksekusi langkah-langkah pengecekan kategori dan insert data          | Sesuai       | ✅      |
| `mysqli_num_rows($result_cek_kategori) > 0` (kategori ditemukan)        | Data produk ditambahkan ke database, return > 0                                  | Sesuai       | ✅      |
| `mysqli_num_rows($result_cek_kategori) == 0` (kategori tidak ditemukan) | Tidak ada data dimasukkan, tidak return nilai atau return 0                      | Sesuai       | ✅      |
| Koneksi DB gagal / query gagal (`mysqli_query` gagal)                   | Fungsi berhenti atau return error                                                | Sesuai       | ✅      |
| Salah satu field input kosong (misalnya `$stok = ""`)                   | Query tetap dijalankan, tergantung validasi form (belum di-handle di fungsi ini) | Sesuai       | ✅      |
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
| Kondisi Yang Diuji                                   | Hasil Yang Diharapkan                                      | Hasil Aktual | Status |
| ---------------------------------------------------- | ---------------------------------------------------------- | ------------ | ------ |
| Fungsi `edit_produk()` dipanggil                     | Fungsi memproses data dan menjalankan query UPDATE         | Sesuai       | ✅      |
| Query berhasil dieksekusi                            | Data produk diubah di database, `mysqli_affected_rows` > 0 | Sesuai       | ✅      |
| Query dijalankan tapi data tidak berubah (data sama) | Query tetap berhasil, `mysqli_affected_rows` = 0           | Sesuai       | ✅      |
| Query gagal dieksekusi (misal koneksi DB error)      | Fungsi gagal atau return 0                                 | Sesuai       | ✅      |
| Salah satu field kosong (misalnya `stok = ""`)       | Query bisa gagal atau berhasil tergantung validasi di DB   | Sesuai       | ✅      |
| `id_barang` tidak ditemukan di DB                    | Tidak ada baris diubah, `mysqli_affected_rows` = 0         | Sesuai       | ✅      |

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

| Kondisi Yang Diuji                                     | Hasil Yang Diharapkan                               | Hasil Aktual | Status |
| ------------------------------------------------------ | --------------------------------------------------- | ------------ | ------ |
| Fungsi dipanggil dengan `nama_kategori` valid          | Data kategori disimpan, return > 0                  | Sesuai       | ✅      |
| Fungsi dipanggil dengan `nama_kategori` yang sudah ada | Insert bisa gagal (jika constraint di DB), return 0 | Sesuai       | ✅      |
| Fungsi dipanggil dengan `nama_kategori` kosong         | Bisa gagal (tergantung validasi DB), return 0       | Sesuai       | ✅      |
| Query gagal (DB error, koneksi terputus, dll)          | Tidak insert, return 0                              | Sesuai       | ✅      |
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
| Kondisi Yang Diuji                                              | Hasil Yang Diharapkan                                | Hasil Aktual | Status |
| --------------------------------------------------------------- | ---------------------------------------------------- | ------------ | ------ |
| Fungsi dipanggil dengan `id_kategori` dan `nama_kategori` valid | Data berhasil diperbarui, return > 0                 | Sesuai       | ✅      |
| Fungsi dipanggil tetapi `nama_kategori` sama seperti sebelumnya | Tidak ada baris terpengaruh, return 0                | Sesuai       | ✅      |
| Fungsi dipanggil dengan `id_kategori` tidak ditemukan           | Tidak ada baris yang diperbarui, return 0            | Sesuai       | ✅      |
| Fungsi dipanggil dengan `nama_kategori` kosong                  | Tergantung DB: gagal (jika NOT NULL), return 0/error | Sesuai       | ✅      |
| Query gagal (misalnya error DB/koneksi terputus)                | Tidak update, return 0 / error                       | Sesuai       | ✅      |
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
| Kondisi Yang Diuji                                  | Hasil Yang Diharapkan                                       | Hasil Aktual | Status |
| --------------------------------------------------- | ----------------------------------------------------------- | ------------ | ------ |
| Parameter `id_kategori` diberikan dan ID valid      | Data kategori terhapus, redirect ke `index.php?page=barang` | Sesuai       | ✅      |
| Parameter `id_kategori` tidak diberikan             | Tidak ada tindakan                                          | Sesuai       | ✅      |
| `id_kategori` tidak ditemukan di database           | Query tetap jalan tapi tidak menghapus apa-apa              | Sesuai       | ✅      |
| Terjadi error pada query (contoh: koneksi DB gagal) | Tidak terhapus, bisa error                                  | Sesuai       | ✅      |


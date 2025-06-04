## 1. Penjualan / Kasir

---
### a. Deskripsi Fungsional
Memiliki 3 fungsi:
- Menambahkan barang ke dalam daftar transaksi (tabel kasir)
- Melakukan proses pembayaran dan mencatat transaksi ke tabel nota serta mengurangi stok
- Menghapus seluruh data transaksi kasir




### b. Logika & Fungsi
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

// Fungsi untuk mendapatkan data produk berdasarkan ID barang
function getProdukById($id_barang)
{
    global $conn;

    $query = "SELECT * FROM produk WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

// Fungsi untuk input barang ke tabel kasir
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

// Fungsi untuk menghitung kembalian
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


// Fungsi untuk memasukkan data ke tabel nota
function masukkanDataNota()
{
    global $conn;

    $query = "INSERT INTO nota (id_barang, jumlah, total, tgl_input) SELECT id_barang, jumlah, total, tgl_input FROM kasir";
    mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data di tabel kasir
function clearDataKasir()
{
    global $conn;

    $query = "DELETE FROM kasir";
    mysqli_query($conn, $query);
}

// Fungsi untuk mendapatkan data kasir
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

function hitungTotalHarga()
{
    global $conn;

    $query = "SELECT SUM(total) AS total_harga FROM kasir";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['total_harga'];
}

// Fungsi untuk mengupdate stok produk setelah transaksi pembelian
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
- getProduk() menampilkan semua produk dari database.
- Jika tombol input_barang diklik:
  - Ambil id_barang dan jumlah
  - Ambil harga_jual dari produk
  - Hitung total
  - Tambah/update data di tabel kasir
- Jika tombol bayar diklik:
  - Ambil bayar (jumlah uang dari user)
  - Hitung kembalian (uang kembali)
  - Jika cukup: simpan ke nota, kurangi stok, dan hapus data kasir
  - Jika tidak: tampilkan alert gagal
- Jika tombol clear diklik:
  - Hapus seluruh data dari kasir

    
### c. Alur Logika Gabungan
```
graph TD
graph TD
    A(Halaman Kasir Dibuka) --> B[Ambil daftar produk untuk dropdown]
    B --> C{Form input_barang disubmit?}
    C -- Ya --> D[Ambil nama_barang & jumlah]
    D --> E{Nama barang dipilih (tidak kosong)?}
    E -- Tidak --> F[Tampilkan alert: Pilih nama barang]
    E -- Ya --> G[Cari produk berdasarkan nama_barang]
    G --> H{Produk ditemukan?}
    H -- Tidak --> I[Tampilkan alert: Produk tidak ditemukan]
    H -- Ya --> J[Ambil id_barang dan harga_jual]
    J --> K[Hitung total = harga_jual × jumlah]
    K --> L[INSERT/UPDATE data ke tabel kasir]
    L --> M[Selesai]

    C -- Tidak --> H{Tombol Bayar diklik?}
    H -- Ya --> I[Ambil input bayar]
    I --> J[Hitung total kasir]
    J --> K{Cukup?}
    K -- Ya --> L[Masukkan ke nota]
    L --> M[Kurangi stok produk]
    M --> N[Hapus data kasir]
    N --> O[Tampilkan alert kembalian]

    K -- Tidak --> P[Alert: Tidak cukup]
    H -- Tidak --> Q{Tombol Clear diklik?}
    Q -- Ya --> R[Hapus semua data kasir]

```

### d. Test Case 
### Input Barang
| TC | Nama Barang Dipilih | Jumlah | Output                                                 | 
| -- | ------------------- | ------ | ------------------------------------------------------ | 
| 1  | ✅                  | 2      | Data berhasil masuk/update ke kasir dengan total benar | 
| 2  | ✅                  | -1     | Data masuk, total bisa negatif                         | 
| 4  | ✅                  | 0      | alert "field harus di isi"                             |      
| 5  | ✅ "Beras"           | "abc"  | Tidak muncul di field "jumla                           |


### Proses Pembayaran
| TC | `bayar` Valid? | Total Harga Ada?      | Output                                              | Catatan                              |
| -- | -------------- | --------------------- | --------------------------------------------------- | ------------------------------------ |
| 1  | ✅ Cukup        | ✅ Ada                 | Nota masuk, stok dikurangi, kasir dikosongkan       | Normal                               |
| 2  | ✅ Kurang       | ✅ Ada                 | Alert "Jumlah pembayaran tidak mencukupi"           | Tidak memproses                      |
| 3  | ❌ Bukan angka  | ✅ Ada                 | Tidak muncul di field                               | Hanya angka saja yang bisa           |
| 4  | Kosong/null    | ✅ Ada                 | Tidak ada respon apapun                               | Aman                                 |
| 5  | ✅ Ya           | ❌ Tidak ada transaksi | Total = 0, semua tetap jalan tapi kembalian = bayar | Perlu validasi jika transaksi kosong |


### Clear Data Kasir
| TC | Tombol Clear Klik? | Output                   | Catatan         |
| -- | ------------------ | ------------------------ | --------------- |
| 1  | ✅ Ya               | Semua data kasir dihapus | Normal          |
| 2  | ❌ Tidak            | Tidak ada aksi           | Tidak berdampak |



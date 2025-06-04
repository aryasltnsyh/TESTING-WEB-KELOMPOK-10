## 1. Insert Barang

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

| Path ID | Jalur Eksekusi                    | Kondisi Yang Diuji                                 | Hasil Yang Diharapkan             | Status |
| ------- | --------------------------------- | -------------------------------------------------- | --------------------------------- | ------ |
| **P1**  | (1) → (2) → (3) → (5) → (6) → (7) | Semua input valid, kategori dari dropdown          | Produk berhasil disimpan ke DB    | ✅      |
| **P2**  | (1) → (2) → (3 gagal)             | Query cek kategori gagal karena koneksi DB         | Fungsi gagal atau error ditangani | ✅      |
| **P3**  | (1) → (2) → (3) → (5) → (6 gagal) | Insert produk gagal (misalnya karena duplikasi ID) | Return 0 atau muncul error        | ✅      |

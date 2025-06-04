🧪 Regression Testing – Aplikasi PharmaPOS 
---
Dokumen ini merangkum hasil pengujian regresi untuk memastikan bahwa perubahan pada sistem PharmaPOS tidak merusak fitur-fitur utama dalam aplikasi.

--
📋 Rekap Hasil Pengujian:
--
Berikut merupakan rekap hasil pengujian regresi secara ringkas dalam bentuk tabel:

| No | Test Case              | Status | Hasil yang Diharapkan                                                                 | Catatan                                                                 | Screenshot |
|----|------------------------|--------|----------------------------------------------------------------------------------------|-------------------------------------------------------------------------|------------|
| 1  | Tambah Kategori                 | ✅     | Data masuk DB, `add_kategori()`Kategori ditambahkan sukses, Kategori <3 dan >15 Karakter                                 | Sesuai               | ![image](https://github.com/user-attachments/assets/23dd4b9b-189d-44c6-95ba-d7347daa83f0)
| 2  | Lihat Daftar Kategori     | ✅     | kategori muncul dan tersortir dari terbaru                                                | Sesuai                                                                 | ![image](https://github.com/user-attachments/assets/d6176360-39e6-4f18-939a-abb202a8dde8)
 |
| 3  | Edit Kategori               | ✅     | Status berubah di DB , flash `"berhasil mengupdate kategori"` logic sudah di rubah <3 sampai >15 karakter                                 | Sesuai                                                                 |![image](https://github.com/user-attachments/assets/3844af0b-6132-4e9d-b41d-c3cd71ec8621)
| 4  | Hapus Kategori           | ✅     | Data terhapus di DB dan dashboard, flash `hapus data kategori? `                             | Sesuai                        |![image](https://github.com/user-attachments/assets/d0230797-8f97-416e-b42a-319484515791)
| 5  | Tambah Barang           | ✅     | Semua data tampil lengkap, format tabel rapi                                           | Sesuai                                                                 | ![image](https://github.com/user-attachments/assets/df5fd4e0-b667-4cc4-8edb-1bd24fa6e9d9)
| 6  | Edit Barang    | ✅     | Status berubah di DB, flash message muncul `Berhasil Diupdate`                                             | Sesuai, tetapi jika username di kosongankan saja masuk                                    | ![image](https://github.com/user-attachments/assets/f096f16c-5ee5-4a23-9c17-f1f93f7923e8)
| 7  | Hapus Barang            | ✅     | Tugas terhapus dari DB dan tabel, flash `Hapus data produk?`                                                 | Sudah sesuai                                                           | ![image](https://github.com/user-attachments/assets/9ee5385a-c0de-4f3f-be4b-acb557db808e)
| 8  | Kasir                | ✅     | Kasir POS berfungsi dengan baik                                                  | Nama user masih muncul setelah logout                                  | ![image](https://github.com/user-attachments/assets/e72ebe7a-2f08-4495-aeec-9df888b5d347)






# BOUNDARY VALUE ANALYSIS – KATEGORI
---
| Field         | Validasi Panjang/Range | Nilai Batas Valid                 | Nilai Batas Invalid        |
| ------------- | ---------------------- | --------------------------------- | -------------------------- |
| Nama Kategori | Minimal 3 karakter     | 3 huruf → ✅ `"Mie"`               | 2 huruf → ❌ `"Mi"`         |
|               | Maksimal 10 karakter   | 10 huruf → ✅ `"KategoriABCDE..."` | 11 huruf → ❌ (11 karakter) |
---
# EQUIVALENCE PARTITIONING – KATEGORI
| Field         | Kelas Valid                              | Kelas Invalid                                             |
| ------------- | ---------------------------------------- | --------------------------------------------------------- |
| Nama Kategori | Huruf/angka/spasi, panjang 3–50 karakter | Kosong, <3 karakter, >50 karakter, hanya simbol, duplikat |
---
# Test Case
| TC ID     | Deskripsi                                      | Input               | Expected Result                                     | Actual Result             | Status Uji |
|-----------|------------------------------------------------|---------------------|----------------------------------------------------|---------------------------|------------|
| TC_KAT_01 | Tambah kategori valid                          | "Obat Ibu Hamil"     | Kategori berhasil ditambahkan                      | Kategori berhasil ditambah| ✅         |
| TC_KAT_02 | Nama kategori 3 huruf (min valid)              | "Min"               | Data diterima                                      | Data diterima             | ✅         |
| TC_KAT_03 | Nama kategori 10 huruf (maks valid)            | "A...Z" (11 huruf)  | Data diterima                                      | Data diterima             | ✅         |
| TC_KAT_04 | Nama kategori 2 huruf                          | "Mi"                | Validasi muncul: "Minimal 3 karakter"              | Data diterima             | ❌         |
| TC_KAT_05 | Nama kategori lebih dari 50 karakter           | (11 huruf)          | Validasi muncul: "Maksimal 50 karakter"            | Data diterima            | ❌         |
| TC_KAT_06 | Nama kategori kosong                           | ""                  | Validasi muncul: "Nama kategori wajib diisi"       | Data diterima(kosong)            | ❌         |
| TC_KAT_07 | Nama kategori hanya simbol                     | "@@@###"            | Validasi muncul: "Nama tidak boleh simbol saja"    | Data diterima            | ❌         |
| TC_KAT_08 | Nama kategori duplikat                         | "Dewasa" (sudah ada)| Validasi muncul: "Kategori sudah tersedia"         | Data diterima            | ❌         |

# Behavior testing
### 📋 BEHAVIOR TESTING – KATEGORI

| TC ID     | Deskripsi                                      | Langkah Uji                                                              | Expected Result                                        | Actual Result            | Status Uji |
|-----------|------------------------------------------------|---------------------------------------------------------------------------|---------------------------------------------------------|--------------------------|------------|
| TC_KB_01  | Tambah kategori baru                           | Input "Obat Ibu hamil" → klik Simpan                                        | Kategori ditambahkan dan muncul di daftar               | Kategori tampil di daftar| ✅         |
| TC_KB_02  | Tambah kategori kosong                         | Kosongkan input → klik Simpan                                           | Validasi muncul: "Nama kategori wajib diisi"            | Data diterima dan disimpan           | ❌         |
| TC_KB_03  | Tambah kategori yang sudah ada                 | Input "Dewasa" (sudah ada) → klik Simpan                               | Validasi muncul: "Kategori sudah tersedia"              | Data diterima dan disimpan           | ✅         |
| TC_KB_04  | Edit nama kategori menjadi valid               | Klik Edit "obat ibu hamil" → ubah jadi "obat ibu hamil 44 bulan" → klik Simpan          | Data kategori berubah jadi "obat ibu hamil 44 bulan"             | Nama berhasil berubah     | ✅         |
| TC_KB_05  | Edit nama kategori menjadi duplikat            | Edit "Dewasa" → ubah jadi "Anak - anak" → klik Simpan                      | Validasi muncul: "Kategori sudah tersedia"              | Data diterima dan disimpan           | ❌         |
| TC_KB_06  | Klik tombol hapus kategori                     | Klik ikon hapus pada "Dewasa"                                       | Muncul popup konfirmasi: "Yakin ingin menghapus?"       | Popup muncul              | ✅         |
| TC_KB_07  | Konfirmasi hapus kategori                      | Klik "Ya" di popup hapus                                                 | Kategori hilang dari daftar                             | Data terhapus             | ✅         |
| TC_KB_08  | Batalkan penghapusan kategori                  | Klik "Hapus" → klik "Tidak"                                             | Kategori tetap ada                                      | Data tetap ada            | ✅         |
| TC_KB_09  | Refresh setelah hapus kategori                 | Hapus kategori → refresh halaman                                        | Kategori tetap tidak muncul                             | Tidak muncul lagi         | ✅         |

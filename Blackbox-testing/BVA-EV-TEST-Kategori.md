# BOUNDARY VALUE ANALYSIS – KATEGORI
---
| Field         | Validasi Panjang/Range | Nilai Batas Valid                 | Nilai Batas Invalid        |
| ------------- | ---------------------- | --------------------------------- | -------------------------- |
| Nama Kategori | Minimal 3 karakter     | 3 huruf → ✅ `"Mie"`               | 2 huruf → ❌ `"Mi"`         |
|               | Maksimal 15 karakter   | 15 huruf → ✅ `"KategoriABCDE..."` | 16 huruf → ❌ (16 karakter) |
---
# EQUIVALENCE PARTITIONING – KATEGORI
| Field         | Kelas Valid                              | Kelas Invalid                                             |
| ------------- | ---------------------------------------- | --------------------------------------------------------- |
| Nama Kategori | Huruf/angka/spasi, panjang 3–15 karakter | Kosong, <3 karakter, >16 karakter, hanya simbol, duplikat |
---
# Test Case
| TC ID     | Deskripsi                                      | Input               | Expected Result                                     | Actual Result             | Status Uji | Tampilan |
|-----------|------------------------------------------------|---------------------|----------------------------------------------------|---------------------------|------------|---|
| TC_KAT_01 | Tambah kategori valid                          | "Obat Ibu Hamil"     | Kategori berhasil ditambahkan                      | Kategori berhasil ditambah| ✅         |![image](https://github.com/user-attachments/assets/7559c652-fee9-4c31-adb9-fc4c938500ff)|
| TC_KAT_02 | Nama kategori 3 huruf (min valid)              | "Min"               | Data diterima                                      | Data diterima             | ✅         |![image](https://github.com/user-attachments/assets/e778acb2-4c84-401d-9492-2725713e52df)|
| TC_KAT_03 | Nama kategori 15 huruf (maks valid)            | "A...Z" (15 huruf)  | Data diterima                                      | Data diterima             | ✅         |![image](https://github.com/user-attachments/assets/7559c652-fee9-4c31-adb9-fc4c938500ff)|
| TC_KAT_04 | Nama kategori 2 huruf                          | "Mi"                | Validasi muncul: "Minimal 3 karakter"              | Data diterima             | ❌         |![image](https://github.com/user-attachments/assets/bf239abb-9ca6-420e-94a0-08764bedf599)|
| TC_KAT_05 | Nama kategori lebih dari 15 karakter           | (20 karakter)          | Validasi muncul: "Maksimal 15 karakter"            | Data diterima            | ❌         |![image](https://github.com/user-attachments/assets/77d92c0b-1ab7-40a7-a5db-820878c30f2b)|
| TC_KAT_06 | Nama kategori kosong                           | ""                  | Validasi muncul: "Nama kategori wajib diisi"       | Data diterima(kosong)            | ❌         |1. ![image](https://github.com/user-attachments/assets/84dfb6b0-7cd5-4e51-b654-3e587c975a2a) <br> 2. ![image](https://github.com/user-attachments/assets/c0cc8294-668c-45d4-9f56-6423955645bb)|
| TC_KAT_07 | Nama kategori hanya simbol                     | "@@@###"            | Validasi muncul: "Nama tidak boleh simbol saja"    | Data diterima            | ❌         |![image](https://github.com/user-attachments/assets/a7d98a6a-821b-4184-89e0-58d42924edd5)|
| TC_KAT_08 | Nama kategori duplikat                         | "Dewasa" (sudah ada)| Validasi muncul: "Kategori sudah tersedia"         | Data diterima            | ❌         |![image](https://github.com/user-attachments/assets/b5543fae-ebbc-4a1b-ae3d-f5437a6def9e)|

# Behavior testing
### 📋 BEHAVIOR TESTING – KATEGORI

| TC ID     | Deskripsi                                      | Langkah Uji                                                              | Expected Result                                        | Actual Result            | Status Uji | Tampilan |
|-----------|------------------------------------------------|---------------------------------------------------------------------------|---------------------------------------------------------|--------------------------|------------|---|
| TC_KB_01  | Tambah kategori baru                           | Input "Obat Ibu hamil" → klik Simpan                                        | Kategori ditambahkan dan muncul di daftar               | Kategori tampil di daftar| ✅         |1. ![image](https://github.com/user-attachments/assets/8989d846-00e3-4e83-a894-960db3d3064c) <br>     2. ![image](https://github.com/user-attachments/assets/7559c652-fee9-4c31-adb9-fc4c938500ff)|
| TC_KB_02  | Tambah kategori kosong                         | Kosongkan input → klik Simpan                                           | Validasi muncul: "Nama kategori wajib diisi"            | Data diterima dan disimpan           | ❌         |1. ![image](https://github.com/user-attachments/assets/84dfb6b0-7cd5-4e51-b654-3e587c975a2a) <br> 2. ![image](https://github.com/user-attachments/assets/c0cc8294-668c-45d4-9f56-6423955645bb)|
| TC_KB_03  | Tambah kategori yang sudah ada                 | Input "Dewasa" (sudah ada) → klik Simpan                               | Validasi muncul: "Kategori sudah tersedia"              | Data diterima dan disimpan           | ✅         |![image](https://github.com/user-attachments/assets/a732a4a4-cd0e-44a0-8ae7-4b0aef4079b3)|
| TC_KB_04  | Edit nama kategori menjadi valid               | Klik Edit "obat ibu hamil" → ubah jadi "obat ibu hamil 44 bulan" → klik Simpan          | Data kategori berubah jadi "obat ibu hamil 44 bulan"             | Nama berhasil berubah     | ✅         |![image](https://github.com/user-attachments/assets/4de7a97f-b8f8-44bd-af4f-99b039f3a7d5)|
| TC_KB_05  | Edit nama kategori menjadi duplikat            | Edit "Dewasa" → ubah jadi "Anak - anak" → klik Simpan                      | Validasi muncul: "Kategori sudah tersedia"              | Data diterima dan disimpan           | ❌         |![image](https://github.com/user-attachments/assets/b5543fae-ebbc-4a1b-ae3d-f5437a6def9e)|
| TC_KB_06  | Klik tombol hapus kategori                     | Klik ikon hapus pada "Dewasa"                                       | Muncul popup konfirmasi: "Yakin ingin menghapus?"       | Popup muncul              | ✅         |![image](https://github.com/user-attachments/assets/e0d914a4-e73a-4554-9805-35b44f856895)|
| TC_KB_07  | Konfirmasi hapus kategori                      | Klik "Ya" di popup hapus                                                 | Kategori hilang dari daftar                             | Data terhapus             | ✅         |![image](https://github.com/user-attachments/assets/f48d6be7-5971-48aa-9ec6-e21d8d338d22)|
| TC_KB_08  | Batalkan penghapusan kategori                  | Klik "Hapus" → klik "Tidak"                                             | Kategori tetap ada                                      | Data tetap ada            | ✅         |![image](https://github.com/user-attachments/assets/db2afe69-1b36-4fef-a5b1-1d06a9b86861)|
| TC_KB_09  | Refresh setelah hapus kategori                 | Hapus kategori → refresh halaman                                        | Kategori tetap tidak muncul                             | Tidak muncul lagi         | ✅         |![image](https://github.com/user-attachments/assets/8fc8a922-89e8-4f41-9fe1-38c2c9e5474f)|

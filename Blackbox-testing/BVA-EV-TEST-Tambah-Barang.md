# BOUNDARY VALUE ANALYSIS - TAMBAH BARANG
---
| Field       | Validasi Panjang/Range           | Nilai Batas Valid                                         | Nilai Batas Invalid                                     |
| ----------- | -------------------------------- | --------------------------------------------------------- | ------------------------------------------------------- |
| Kategori    | Wajib dipilih dari opsi dropdown | "Dewasa"                                            | (Kosong/tidak dipilih)                                |
| Nama Barang | Minimal 3 karakter, maksimal 20 | 3 karakter →  `"CTM"`<br>20 karakter →  (string panjang) | 0 karakter →  (kosong)<br>21 karakter →  (kelebihan) |
| Stok        | Integer ≥ 0                      | 0 →  `"0"`<br>1 →  `"1"`                                | 0 karakter →  (kosong)<br>-1 →  `"-1"`                                           |
| Harga Jual  | Integer ≥ 0                      | 0 →  `"0"`<br>1 →  `"1"`                                | 0 karakter →  (kosong)<br>-1 →  `"-1"`                                           |
| Harga Beli  | Integer ≥ 0                      | 0 →  `"0"`<br>1 →  `"1"`                                | 0 karakter →  (kosong)<br>-1 →  `"-1"`                                           |

# EQUIVALENCE PARTITIONING - TAMBAH BARANG
---
| Field       | Kelas Valid                                                        | Kelas Invalid                                                               |
| ----------- | ------------------------------------------------------------------ | --------------------------------------------------------------------------- |
| Kategori    | Salah satu opsi dari dropdown (`Dewasa`, `Anak-anak``) | Kosong / tidak dipilih<br>Nilai yang tidak ada di dropdown (`Game`)         |
| Nama Barang | String teks (huruf, angka, spasi), panjang ≥ 3 dan ≤ 20           | Kosong (`""`)<br>Simbol tidak wajar (`"@@@###"`)<br>Lebih dari 20 karakter |
| Stok        | Integer bulat ≥ 0                                                  | Negatif (`-1`)<br>Nilai pecahan (`3.5`)<br>String non-angka (`"sepuluh"`)   |
| Harga Jual  | Integer bulat ≥ 0                                                  | Negatif (`-1`)<br>String non-angka (`"seribu"`)                             |
| Harga Beli  | Integer bulat ≥ 0                                                  | Negatif (`-1`)<br>String non-angka (`"dua puluh ribu"`)                     |

# Test Case
---
| TC ID     | Test Case Description                               | Input                                   | Expected Result                                  | Actual Result | Status Uji |
|-----------|-----------------------------------------------------|-----------------------------------------|--------------------------------------------------|--------|----|
| TC_TB_01  | Tambah barang dengan semua data valid               | Kategori: Dewasa<br>Nama: Panadol<br>Stok: 10<br>Harga Beli: 20000<br>Harga Jual: 25000 | Barang berhasil ditambahkan                      |Barang Berhasil ditambahkan| ✅     |
| TC_TB_02  | Nama barang hanya 1 karakter           | Nama: A                                 | Alert:"Nama barang minimal 3 karakter"                                    |Data tersimpan | ❌     |
| TC_TB_03  | Nama barang 20 karakter (batas atas)              | Nama: (obat sakit kepala MG)                       | Data diterima dan disimpan                                  |Data diterima dan disimpan | ✅     |
| TC_TB_04  | Nama barang 21 karakter (lebih dari batas)              | Nama: (obat sakit kepala MGI)                       | Data yang disimpan tetap 20                                    | Data yang disimpan 20 | ✅     |
| TC_TB_05  | Nama barang kosong                                  | Nama: (kosong)                          | Validasi muncul: "Nama Barang wajib diisi"       |Data diterima dan disimpan| ❌     |
| TC_TB_06  | Stok bernilai kosong                               | Stok: " "                                | Validasi muncul: "Stok wajib diisi"      |Data diterima dan disimpan| ❌     |
| TC_TB_07  | Stok bernilai negatif                               | Stok: -1                                | Validasi muncul: "Stok tidak boleh negatif"      |Data diterima dan disimpan| ❌     |
| TC_TB_08  | Stok menggunakan teks                               | Stok: "sepuluh"                         | Validasi muncul: "Stok harus berupa angka bulat" |Data diterima dan disimpan| ❌     |
| TC_TB_09  | Harga beli kosong                                  | Harga Beli: " "                       | Validasi muncul: "Harga beli tidak boleh kosongg"|Data diterima dan disimpan| ❌     |
| TC_TB_10  | Harga beli negatif                                  | Harga Beli: -5000                       | Validasi muncul: "Harga beli tidak boleh negatif"|Data diterima dan disimpan| ❌     |
| TC_TB_11  | Harga beli dalam teks                               | Harga beli: "lima ribu"              | Validasi muncul: "Harga beli harus berupa angka" |Data diterima dan disimpan| ❌     |
| TC_TB_12  | Harga jual kosong                                  | Harga jual: " "                       | Validasi muncul: "Harga jual tidak boleh kosongg"|Data diterima dan disimpan| ❌     |
| TC_TB_13  | Harga jual negatif                                  | Harga Jual: -10000                      | Validasi muncul: "Harga jual tidak boleh negatif"|Data diterima dan disimpan| ❌     |
| TC_TB_14  | Harga jual dalam teks                               | Harga Jual: "sepuluh ribu"              | Validasi muncul: "Harga jual harus berupa angka" |Data diterima dan disimpan| ❌     |
| TC_TB_15  | Kategori tepat dipilih                             | Kategori: (Dewasa)                      | Data valid dan berhasil disimpan        |Data valid dan berhasil disimpan | ✅     |
| TC_TB_16  | Nama barang mengandung simbol                      | Nama: "@@@###"                          | Validasi muncul: "Nama tidak boleh mengandung simbol khusus" |Data diterima dan disimpan| ❌     |
| TC_TB_17  | Harga jual = 0 (promo / gratis)                     | Harga Jual: 0                           | Barang tetap bisa ditambahkan                    |Data diterima dan disimpan| ✅     |
| TC_TB_18  | Harga beli = 0                                      | Harga Beli: 0                           | Barang tetap bisa ditambahkan                    |Data diterima dan disimpan| ✅     |
| TC_TB_19  | Harga jual lebih kecil dari harga beli              | Harga Beli: 30000, Harga Jual: 20000    | Validasi muncul: "Harga jual tidak boleh < harga beli" |Data diterima dan disimpan| ❌     |

# Behavior Testing
### ✏️ EDIT BARANG

| TC ID     | Deskripsi                                      | Langkah Uji                                                                 | Expected Result                                       | Actual Result                        | Status Uji |
|-----------|------------------------------------------------|------------------------------------------------------------------------------|--------------------------------------------------------|--------------------------------------|------------|
| TC_BE_01  | Edit barang dengan data baru                   | Klik "Edit" → ubah nama jadi "Oskadon" → klik "Simpan"                 | Data barang berubah jadi "oskadon" di daftar       | Data berubah sesuai input            | ✅         |
| TC_BE_02  | Form edit menampilkan data lama                | Klik "Edit" pada barang "Oskadon"                                       | Form terisi otomatis dengan data "Oskadon"          | Form terisi sesuai data              | ✅         |
| TC_BE_03  | Edit lalu klik batal                           | Klik "Edit" → ubah nama jadi "Mixagrip" → klik "Batal"                        | Tidak ada perubahan data pada daftar barang            | Data tetap "Oskadon"              | ✅         |
| TC_BE_04  | Edit harga jual < harga beli                   | Harga beli: 30000 → ubah harga jual jadi 20000                             | Validasi muncul: "Harga jual tidak boleh < harga beli" | Data diterima dan disimpan               | ❌         |

---

### 🗑️ DELETE BARANG

| TC ID     | Deskripsi                                      | Langkah Uji                                                                 | Expected Result                                       | Actual Result                        | Status Uji |
|-----------|------------------------------------------------|------------------------------------------------------------------------------|--------------------------------------------------------|--------------------------------------|------------|
| TC_BE_05  | Klik tombol hapus                              | Klik ikon "Hapus" pada barang                                              | Muncul popup konfirmasi: "Yakin ingin menghapus?"      | Popup muncul                         | ✅         |
| TC_BE_06  | Konfirmasi hapus barang                        | Klik "Hapus" → klik "Ya"                                                   | Barang terhapus dan tidak tampil di daftar             | Data barang  tidak terhapus              | ❌         |
| TC_BE_07  | Batalkan penghapusan                           | Klik "Hapus" → klik "Tidak"                                                | Barang tetap ada di daftar                             | Barang tetap muncul                  | ✅         |
| TC_BE_08  | Hapus barang lalu refresh halaman              | Hapus barang "Oskadon" → refresh halaman                                | Barang tetap tidak muncul setelah refresh              | Data barang masih ada  | ❌         |

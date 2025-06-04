
| TC ID | Deskripsi                          | Input               | Expected Result                                | Actual Result               | Status Uji |
|-------|------------------------------------|----------------------|------------------------------------------------|------------------------------|------------|
| TC 1  | Tambah kategori valid              | Obat Ibu Hamil       | Kategori berhasil ditambahkan                 | Kategori berhasil ditambah  | ✅          |
| TC 2  | Nama kategori 3 huruf (min valid)  | Min                  | Data diterima                                 | Data diterima               | ✅          |
| TC 3  | Nama kategori 15 huruf (maks valid)| A...Z (15 huruf)     | Data diterima                                 | Data diterima               | ✅          |
| TC 4  | Nama kategori 2 huruf              | Mi                   | Validasi muncul: "Minimal 3 karakter"         | Data diterima               | ❌          |
| TC 5  | Nama kategori > 15 karakter        | NamaKategoriSangat   | Validasi muncul: "Maksimal 15 karakter"       | Data diterima               | ❌          |
| TC 6  | Nama kategori kosong               |                      | Validasi muncul: "Nama kategori wajib diisi"  | Data diterima (kosong)      | ❌          |
| TC 7  | Nama kategori hanya simbol         | @@@###               | Validasi muncul: "Nama tidak boleh simbol saja"| Data diterima              | ❌          |
| TC 8  | Nama kategori duplikat             | Dewasa               | Validasi muncul: "Kategori sudah tersedia"    | Data diterima               | ❌          |
| TC 9  | Nama kategori simbol + duplikat    | @@@Dewasa@@@         | Validasi muncul: "Format tidak valid & duplikat" | Data diterima           | ❌          |

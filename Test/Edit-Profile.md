# Parameter Penilaian 
| Field     | Parameter Validasi                     | Jenis Pengujian | Alasan Valid/Invalid                              |
| --------- | -------------------------------------- | --------------- | ------------------------------------------------- |
| Username  | 3–15 karakter, huruf/angka             | BVA & EP        | Valid:3/15 karakter; Invalid: 4/16 karakter      |
| Password  | Minimal 6-15 karakter, kombinasi karakter | BVA & EP        | Valid: ≥6, kombinasi huruf/angka/simbol           |


#  Metode: Boundary Value Analysis (BVA)

### Field: Username 
| No | Input                | Deskripsi                | Expected Result                 | Aktual                     | Status |
| -- | -------------------- | ---------------------- | ------------------------------- | ------------------------- |----|
| 1  | `""`                 | Kosong                 |  Error: "Username wajib diisi" | Pesan ditampilkan |     ✅passed                    |
| 2  | `"ab"` (2 karakter)  | Di bawah batas minimum |  Error: "Minimal 3 karakter"   | Data diperbarui  |❌Failed |
| 3  | `"abc"` (3 karakter) | Tepat batas minimum    |  Data diperbarui               |  Data diperbaui   | ✅Passed
| 4  | `15 karakter`        | Tepat batas maksimum   |  Data diperbarui                         | Data diperbarui|✅Passed                        |
| 5  | `21 karakter`        | Di atas batas maksimum |  Error: "Maksimal 15 karakter" |  Data diperbaui |❌Failed|

---

### Field: Password 
| No | Input            | Deskripsi                  | Expected Result                 | Aktual                    | Status |
| -- | ---------------- | ----------------------- | ------------------------------- | ------------------------- |----|
| 1  | `""`             | Kosong                  |  Error: "Password wajib diisi" | pesan tidak ada          | ❌Failed              |
| 2  | `"12345"` (5)  | Di bawah batas minimum  |  Error: "Minimal 6-15 kombinasi karakter"   | Data diperbarui |❌Failed |
| 3  | `"12345678"` (8) | Tepat batas minimum     | Error: "Minimal 6-15 kombinasi karakter"                         | Data diperbarui     |❌Failed                    |
| 4  | `"sans1234"`     | Kombinasi huruf & angka | Data diperbarui                          | Data diperbarui    |✅Passed                         |
| 5  | `sandi1234567890`(15)    | Tepat batas maksimum    | Data diperbarui                           | Data diperbarui   | ✅Passed                         |
| 6  | `Dsandi1234567890`(16)    | Di atas batas maksimum  | Error: "Minimal 6-15 kombinasi karakter" | Data diperbarui   | ❌Failed                        |


---

#  Metode: Equivalence Partitioning (EP)

| No | Field    | Input            | Kategori                         | Expected Result                 | Aktual                    | Status |
| -- | -------- | ---------------- | -------------------------------- | ------------------------------- | ----- |----|
| 1  | Username | "budi123"        | Valid                            |  Username diperbarui           | Data diperbarui     |✅Passed|
| 2  | Username | ""               | Tidak valid (kosong)             |  Error: "Username wajib diisi" | Error tampil     |✅Passed|
| 3  | Username | "ab"             | Invalid |  Error: "Minimal 3 karakter"   | ❌     |Data diperbarui |❌Failed |
| 4  | Password | "strongP\@ss123" | Valid                            |  Password diperbarui           | Data diperbarui     |✅Passed|
| 5  | Password | "pass" (4 huruf) | Invalid     |  Error: "Minimal 6-15 kombinasi karakter"   |Data diperbarui     |❌Failed |



---



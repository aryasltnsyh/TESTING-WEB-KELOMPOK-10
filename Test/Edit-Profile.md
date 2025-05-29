# Parameter Penilaian 
| Field     | Parameter Validasi                     | Jenis Pengujian | Alasan Valid/Invalid                              |
| --------- | -------------------------------------- | --------------- | ------------------------------------------------- |
| Username  | 3–15 karakter, huruf/angka             | BVA & EP        | Valid:3/15 karakter; Invalid: 4/16 karakter      |
| Password  | Minimal 6 karakter, kombinasi karakter | BVA & EP        | Valid: ≥6, kombinasi huruf/angka/simbol           |


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

### Field: Password (minimum 8 karakter, maksimum 32 karakter)
| No | Input               | Alasan                    | Expected Result            |
|----|---------------------|---------------------------|-----------------------------|
| 1  | ""                  | Kosong                    | ❌ Error: "Password wajib diisi" |
| 2  | "1234567"           | Tepat terisi      | ✅ Valid   |
| 3  | "12345678"          | Tepat batas minimum       | ✅ Valid                     |
| 4 | "sans1234" | Tepat kombinasi | ✅ Valid |
| 5  | 32 karakter         | Di atas batas     | ✅ Valid                     |


---

#  Metode: Equivalence Partitioning (EP)

| No | Field     | Input               | Kategori                 | Expected Result           |
|----|-----------|---------------------|--------------------------|---------------------------|
| 1  | Username  | "budi123"           | Valid                    | ✅ Username diperbarui    |
| 2  | Username  | ""                  | Tidak valid (kosong)     | ❌ Error: "Username wajib diisi" |
| 3  | Username  | "ab"                | valid                    | ✅ Username diperbarui    |
| 4  | Password  | "strongP@ss123"     | Valid                    | ✅ Password diperbarui    |
| 5  | Password  | "pass"              | valid | ✅ Password diperbarui  |


---



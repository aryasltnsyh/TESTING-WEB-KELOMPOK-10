#  Metode: Boundary Value Analysis (BVA)

### Field: Username (minimum 3 karakter, maksimum 20 karakter)
| No | Input               | Alasan                    | Expected Result           |
|----|---------------------|---------------------------|----------------------------|
| 1  | ""                  | Di bawah batas minimum    | ❌ Error: "Username wajib diisi" |
| 2  | "ab"                | Tepat batas minimum       |  ✅ Valid    |
| 3  | "abc"               | Tepat batas minimum       | ✅ Valid                    |
| 4  | 20 karakter         | Di atas batas      | ✅ Valid                    |

---

### Field: Password (minimum 8 karakter, maksimum 32 karakter)
| No | Input               | Alasan                    | Expected Result            |
|----|---------------------|---------------------------|-----------------------------|
| 1  | ""                  | Kosong                    | ❌ Error: "Password wajib diisi" |
| 2  | "1234567"           | Tepat batas minimum       | ✅ Valid   |
| 3  | "12345678"          | Tepat batas minimum       | ✅ Valid                     |
| 4  | 32 karakter         | Di atas batas     | ✅ Valid                     |


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

# BEHAVIOR TESTING

| ID   | Fitur        | Langkah Uji                                                            | Input                                                                | Expected Result                                          | Actual | Status |
| ---- | ------------ | ---------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------- | ------ | ------ |
| TC01 | Edit Profile | Kosongkan username dan password, lalu klik tombol Simpan               | Username: ""<br>Password: ""                                         | Error: “Username wajib diisi”                            | Muncul "username tidak boleh kosong"      | ✅Passed       |
| TC02 | Edit Profile | Masukkan username di bawah 3 karakter                                  | Username: "ab"<br>Password: "strongpass123"                          | Username diperbarui                                      | pesan Username diperbarui       | ✅Passed       |
| TC03 | Edit Profile | Masukkan username valid dan kosongkan password                         | Username: "budi123"<br>Password: ""                                  | Error: “Password wajib diisi”                            | tidak ada pesan muncul       | ❌Failed       |
| TC04 | Edit Profile | Masukkan password di bawah 8 karakter                                  | Username: "budi123"<br>Password: "pass"                              | Password diperbarui                                      | pesan  diperbarui       | ✅Passed       |
| TC05 | Edit Profile | Masukkan username & password valid                                     | Username: "budi123"<br>Password: "strongP\@ss123"                    | Username dan Password diperbarui                         | pesan  diperbarui       | ✅Passed       |
| TC06 | Edit Profile | Masukkan password tepat 8 karakter                                     | Username: "abc"<br>Password: "12345678"                              | Password diperbarui                                      | pesan  diperbarui       | ✅Passed       |
| TC07 | Edit Profile | Masukkan username tepat 3 karakter dan password 32 karakter (maksimum) | Username: "abc"<br>Password: "12345678901234567890123456789012"      | Username dan Password diperbarui                         | pesan  diperbarui       | ✅Passed       |
| TC08 | Edit Profile | Masukkan username 20 karakter dan password valid                       | Username: "usernamemaxchar12345"<br>Password: "validpass123"         | Username dan Password diperbarui                         | pesan  diperbarui       | ✅Passed      |
| TC09 | Edit Profile | Masukkan username valid dan password lebih dari 32 karakter            | Username: "budi123"<br>Password: "123456789012345678901234567890123" | Error: “Password maksimal 32 karakter”                   | pesan  diperbarui       | ❌Failed       |
| TC10 | Edit Profile | Masukkan username lebih dari 20 karakter                               | Username: "thisusernameistoolong123"<br>Password: "strongpass"       | Error: “Username maksimal 20 karakter”                   | pesan  diperbarui       | ❌Failed       |


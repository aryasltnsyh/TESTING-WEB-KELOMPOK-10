# BOUNDARY VALUE ANALYSIS - REGISTER

| Field         | Validasi Panjang/Range | Nilai Batas Valid                                     | Nilai Batas Invalid                                  |
| ------------- | ---------------------- | ----------------------------------------------------- | ---------------------------------------------------- |
| **Full Name** | Minimal 3 huruf        | `3` huruf → ✅ `"San"`                                 | `2` huruf → ❌ `"Sa"`                                 |
| **Username**  | 5–15 karakter          | `5` → ✅ `"user1"`<br>`15` → ✅ `"usernamelengkap"`     | `4` → ❌ `"usr"`<br>`16` → ❌ `"usernamelengkapx"`     |
| **Password**  | Minimal 6 karakter     | `6` → ✅ `"pass12"`                                    | `5` → ❌ `"12345"`                                    |
| **Phone**     | 10–13 digit angka      | `11` → ✅ `"0812345678"`<br>`13` → ✅ `"0812345678901"` | `10` → ❌ `"0812345677"`<br>`14` → ❌ `"08123456789012"` |
| **Address**   | Minimal 5 karakter     | `5` → ✅ `"Jl.AB"`                                     | `4` → ❌ `"Jln"`                                      |

# EQUIVALENCE PARTITIONING - REGISTER

| Field         | Kelas Valid                               | Kelas Invalid                                                               |
| ------------- | ----------------------------------------- | --------------------------------------------------------------------------- |
| **Full Name** | Huruf & spasi, ≥ 3 huruf                  | Kosong, <3 huruf             |
| **Username**  | 5–15 karakter, huruf/angka                | <5 atau >15 karakter                        |
| **Password**  | ≥6 karakter, kombinasi huruf/angka/simbol | <6 karakteR        |
| **Email**     | Format email valid (`a@b.com`)            | Tanpa `@`, tanpa domain, kosong (`"abc"`, `"a@"`, `"@b.com"`, `""`)         |
| **Phone**     | 11–13 digit angka                         | <10 atau >13 digit, mengandung huruf/simbol (`"08abc56789"`, `"0812-3456"`) |
| **Address**   | ≥5 karakter, huruf/angka/simbol umum      | Kosong atau <5 karakter (`"RT2"`, `""`)                                     |

# BEHAVIOR TESTING - REGISTER
| ID   | Fitur    | Langkah Uji                                              | Input                                                                                                                                                 | Expected Result                                               | Actual | Status |
| ---- | -------- | -------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------- | ------ | ------ |
| TC01 | Register | Kosongkan semua field dan klik tombol "Register"         | Semua field kosong                                                                                                                                    | Error muncul pada setiap field: “Wajib diisi”                 | Tidak ada error muncul     |  ❌   |
| TC02 | Register | Isi Full Name hanya 2 huruf dan klik "Register"          | Full Name: "Sa"                                                                                                                                       | Error: “Minimal 3 huruf”                                      | Muncul pesan"minimal 3 karakter"      | ✅Passed   |
| TC03 | Register | Isi Username kurang dari 5 karakter                      | Username: "usr"                                                                                                                                       | Error: “Minimal 6 karakter”                                   | Muncul pesan"minimal 6 karakter"    | ✅Passed    |
| TC04 | Register | Isi Password kurang dari 6 karakter                      | Password: "12345"                                                                                                                                     | Error: “Minimal 6 karakter”                                   |  Muncul pesan"minimal 6 karakter"      | ✅Passed       |
| TC05 | Register | Isi Phone hanya 10 digit (batas bawah tidak valid)       | Phone: "0812345677"                                                                                                                                   | Error: “Minimal 11 digit”                                     | Muncul pesan"minimal 11 digit dan harus angkar"      | ✅Passed       |
| TC06 | Register | Isi Address hanya 4 karakter                             | Address: "J1n"                                                                                                                                        | Error: “Minimal 5 karakter”                                   | Muncul pesan"minimal 6 karakter"      |  ✅Passed     |
| TC07 | Register | Isi Email tanpa simbol `@`                               | Email: "abc.com"                                                                                                                                      | Error: “Format email tidak valid”                             | muncul pesan “Format email tidak valid”      | ✅Passed      |
| TC08 | Register | Isi semua field dengan nilai valid                       | Full Name: "Sani"<br>Username: "user123"<br>Password: "pass123"<br>Email: "[a@b.com](mailto:a@b.com)"<br>Phone: "08123456789"<br>Address: "Jl. Kebun" | Register berhasil, redirect ke halaman verify                  | Di arahkan ke halaman vreify      | ✅Passed      |
| TC09 | Register | Isi semua field valid, tapi email sudah pernah digunakan | Email: "[a@b.com](mailto:a@b.com)" (sudah terdaftar)                                                                                                  | Error: “Email sudah digunakan”                                | Muncul pesan " Email sudah digunakan      | Passed       |
| TC10 | Register | Isi password hanya huruf, tanpa angka/simbol             | Password: "abcdefg"                                                                                                                                   |  Error: “Harus kombinasi” | muncul pesan password hsrus kombinasi      | ✅Passed      |
| TC11 | Register | Isi username 16 karakter (melebihi batas valid)          | Username: "usernamelengkapx"                                                                                                                          | Error: “Maksimal 15 karakter”                                 | muncul pesan "minimal 15 karakter      | ✅Passed      |

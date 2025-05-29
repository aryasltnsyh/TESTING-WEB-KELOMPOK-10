# Parameter Penilaian 
| Field     | Nilai Uji                       | Status    | Jenis Validasi | Alasan Penilaian                                                 |
| --------- | ------------------------------- | --------- | -------------- | ---------------------------------------------------------------- |
| Full Name | "San"                           | ✅ Valid   | BVA, EP        | Panjang = 3 huruf, sesuai syarat minimal                         |
| Full Name | "Sa"                            | ❌ Invalid | BVA, EP        | Kurang dari 3 huruf                                              |
| Username  | "user1"                         | ✅ Valid   | BVA, EP        | Panjang = 5 karakter, sesuai batas bawah                         |
| Username  | "usernamelengkap"               | ✅ Valid   | BVA, EP        | Panjang = 15 karakter, sesuai batas atas                         |
| Username  | "usr"                           | ❌ Invalid | BVA, EP        | Kurang dari 5 karakter                                           |
| Username  | "usernamelengkapx"              | ❌ Invalid | BVA, EP        | Lebih dari 15 karakter                                           |
| Password  | "pass12"                        | ✅ Valid   | BVA, EP        | Minimal 6 karakter, kombinasi huruf & angka                      |
| Password  | "12345"                         | ❌ Invalid | BVA, EP        | Hanya 5 karakter, tidak memenuhi syarat                          |
| Phone     | "0812345678"                    | ✅ Valid   | BVA, EP        | 10 digit angka, sesuai batas bawah                               |
| Phone     | "0812345678901"                 | ✅ Valid   | BVA, EP        | 13 digit angka, sesuai batas atas                                |
| Phone     | "0812345677"                    | ❌ Invalid | BVA, EP        | Hanya 9 digit, kurang dari batas bawah                           |
| Phone     | "08123456789012"                | ❌ Invalid | BVA, EP        | 14 digit, melebihi batas atas                                    |
| Phone     | "08abc56789"                    | ❌ Invalid | EP             | Mengandung huruf, bukan digit semua                              |
| Email     | "[abc@b.com](mailto:abc@b.com)" | ✅ Valid   | EP             | Format email lengkap ([nama@domain.com](mailto:nama@domain.com)) |
| Email     | "abc"                           | ❌ Invalid | EP             | Tidak mengandung '@' dan domain                                  |
| Email     | "@b.com"                        | ❌ Invalid | EP             | Tidak ada nama sebelum '@'                                       |
| Email     | "abc@"                          | ❌ Invalid | EP             | Tidak ada domain setelah '@'                                     |
| Address   | "Jl. AB"                        | ✅ Valid   | BVA, EP        | 5 karakter, karakter umum diperbolehkan                          |
| Address   | "Jln"                           | ❌ Invalid | BVA, EP        | Hanya 3 karakter, tidak memenuhi syarat                          |
| Address   | "RT2"                           | ❌ Invalid | EP             | <5 karakter, tidak sesuai                                        |
| Address   | "" (kosong)                     | ❌ Invalid | EP             | Kosong, tidak memenuhi syarat minimal karakter                   |


# BOUNDARY VALUE ANALYSIS - REGISTER
---
| Field         | Validasi Panjang/Range | Nilai Batas Valid                                     | Nilai Batas Invalid                                  |
| ------------- | ---------------------- | ----------------------------------------------------- | ---------------------------------------------------- |
| **Full Name** | Minimal 3 huruf        | `3` huruf → ✅ `"San"`                                 | `2` huruf → ❌ `"Sa"`                                 |
| **Username**  | 5–15 karakter          | `5` → ✅ `"user1"`<br>`15` → ✅ `"usernamelengkap"`     | `4` → ❌ `"usr"`<br>`16` → ❌ `"usernamelengkapx"`     |
| **Password**  | Minimal 6 karakter     | `6` → ✅ `"pass12"`                                    | `5` → ❌ `"12345"`                                    |
| **Phone**     | 10–13 digit angka      | `11` → ✅ `"0812345678"`<br>`13` → ✅ `"0812345678901"` | `10` → ❌ `"0812345677"`<br>`14` → ❌ `"08123456789012"` |
| **Address**   | Minimal 5 karakter     | `5` → ✅ `"Jl.AB"`                                     | `4` → ❌ `"Jln"`                                      |

# EQUIVALENCE PARTITIONING - REGISTER
---
| Field         | Kelas Valid                               | Kelas Invalid                                                               |
| ------------- | ----------------------------------------- | --------------------------------------------------------------------------- |
| **Full Name** | Huruf & spasi, ≥ 3 huruf                  | Kosong, <3 huruf             |
| **Username**  | 5–15 karakter, huruf/angka                | <5 atau >15 karakter                        |
| **Password**  | ≥6 karakter, kombinasi huruf/angka/simbol | <6 karakteR        |
| **Email**     | Format email valid (`a@b.com`)            | Tanpa `@`, tanpa domain, kosong (`"abc"`, `"a@"`, `"@b.com"`, `""`)         |
| **Phone**     | 11–13 digit angka                         | <10 atau >13 digit, mengandung huruf/simbol (`"08abc56789"`, `"0812-3456"`) |
| **Address**   | ≥5 karakter, huruf/angka/simbol umum      | Kosong atau <5 karakter (`"RT2"`, `""`)                                     |

# TEST CASE REGISTER
---
| TC ID | Field     | Test Case Description                | Input              | Expected Result                            | Status |
| ----- | --------- | ------------------------------------ | ------------------ | ------------------------------------------ | ------ |
| TC01  | Full Name | Input kurang dari 3 huruf            | `Sa`               | Gagal – Error: "Nama minimal 3 huruf"      | ❌      |
| TC02  | Full Name | Input tepat 3 huruf                  | `San`              | Berhasil                                   | ✅      |
| TC03  | Username  | Input < 5 karakter                   | `usr`              | Gagal – Error: "Username minimal 5"        | ❌      |
| TC04  | Username  | Input 5 karakter (batas bawah valid) | `user1`            | Berhasil                                   | ✅      |
| TC05  | Username  | Input 15 karakter (batas atas valid) | `usernamelengkap`  | Berhasil                                   | ✅      |
| TC06  | Username  | Input > 15 karakter                  | `usernamelengkapx` | Gagal – Error: "Max 15 karakter"           | ❌      |
| TC07  | Password  | Input < 6 karakter                   | `12345`            | Gagal – Error: "Password terlalu pendek"   | ❌      |
| TC08  | Password  | Input = 6 karakter                   | `pass12`           | Berhasil                                   | ✅      |
| TC09  | Email     | Format tidak valid (tanpa `@`)       | `abc.com`          | Gagal – Error: "Format email salah"        | ❌      |
| TC10  | Email     | Format valid                         | `user@mail.com`    | Berhasil                                   | ✅      |
| TC11  | Phone     | Kurang dari 10 digit                 | `0812345677`       | Gagal – Error: "No. HP tidak valid"        | ❌      |
| TC12  | Phone     | Tepat 11 digit                       | `08123456789`      | Berhasil                                   | ✅      |
| TC13  | Phone     | 14 digit (melebihi batas)            | `08123456789012`   | Gagal – Error: "No. HP tidak valid"        | ❌      |
| TC14  | Phone     | Mengandung huruf                     | `08abc56789`       | Gagal – Error: "No. HP tidak valid"        | ❌      |
| TC15  | Address   | <5 karakter                          | `Jln`              | Gagal – Error: "Alamat minimal 5 karakter" | ❌      |
| TC16  | Address   | Tepat 5 karakter                     | `J1.AB`            | Berhasil                                   | ✅      |

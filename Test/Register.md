# Parameter Penilaian 
| Field     | Parameter Validasi                     | Jenis Pengujian | Alasan Valid/Invalid                              |
| --------- | -------------------------------------- | --------------- | ------------------------------------------------- |
| Full Name | Minimal 3 huruf                        | BVA & EP        | Valid: panjang = 3, huruf semua; Invalid: <3      |
| Username  | 5–15 karakter, huruf/angka             | BVA & EP        | Valid: 5/15 karakter; Invalid: 4/16 karakter      |
| Password  | Minimal 6 karakter, kombinasi karakter | BVA & EP        | Valid: ≥6, kombinasi huruf/angka/simbol           |
| Phone     | 10–13 digit angka                      | BVA & EP        | Valid: hanya digit, 10–13; Invalid: huruf/simbol  |
| Email     | Format email                           | EP              | Valid: format lengkap; Invalid: tanpa '@', domain |
| Address   | Minimal 5 karakter, bebas format umum  | BVA & EP        | Valid: ≥5 karakter; Invalid: kosong/<5 karakter   |


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
| TC ID | Field     | Test Case Description                | Input              | Expected Result                            | Aktual |  Status |
| ----- | --------- | ------------------------------------ | ------------------ | ------------------------------------------ | ------ |----|
| TC01  | Full Name | Input kurang dari 3 huruf            | `Sa`               | Gagal – Error: "Nama minimal 3 huruf"      | Muncul Pesan "Nama minimal 3 huruf"      |✅|
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

**BOUNDARY VALUE ANALYSIS **

**FORM REGISTER**

| Field         | Validasi Panjang/Range | Nilai Batas Valid                                     | Nilai Batas Invalid                                  |
| ------------- | ---------------------- | ----------------------------------------------------- | ---------------------------------------------------- |
| **Full Name** | Minimal 3 huruf        | `3` huruf → ✅ `"San"`                                 | `2` huruf → ❌ `"Sa"`                                 |
| **Username**  | 5–15 karakter          | `5` → ✅ `"user1"`<br>`15` → ✅ `"usernamelengkap"`     | `4` → ❌ `"usr"`<br>`16` → ❌ `"usernamelengkapx"`     |
| **Password**  | Minimal 6 karakter     | `6` → ✅ `"pass12"`                                    | `5` → ❌ `"12345"`                                    |
| **Phone**     | 10–13 digit angka      | `11` → ✅ `"0812345678"`<br>`13` → ✅ `"0812345678901"` | `10` → ❌ `"0812345677"`<br>`14` → ❌ `"08123456789012"` |
| **Address**   | Minimal 5 karakter     | `5` → ✅ `"Jl.AB"`                                     | `4` → ❌ `"Jln"`                                      |

**EQUIVALENCE PARTITIONING**
**FORM REGISTER**
| Field         | Kelas Valid                               | Kelas Invalid                                                               |
| ------------- | ----------------------------------------- | --------------------------------------------------------------------------- |
| **Full Name** | Huruf & spasi, ≥ 3 huruf                  | Kosong, <3 huruf             |
| **Username**  | 5–15 karakter, huruf/angka                | <5 atau >15 karakter                        |
| **Password**  | ≥6 karakter, kombinasi huruf/angka/simbol | <6 karakteR        |
| **Email**     | Format email valid (`a@b.com`)            | Tanpa `@`, tanpa domain, kosong (`"abc"`, `"a@"`, `"@b.com"`, `""`)         |
| **Phone**     | 11–13 digit angka                         | <10 atau >13 digit, mengandung huruf/simbol (`"08abc56789"`, `"0812-3456"`) |
| **Address**   | ≥5 karakter, huruf/angka/simbol umum      | Kosong atau <5 karakter (`"RT2"`, `""`)                                     |


# Parameter Penilaian 
| Field     | Parameter Validasi                     | Jenis Pengujian | Alasan Valid/Invalid                              |
| --------- | -------------------------------------- | --------------- | ------------------------------------------------- |
| Username  | 3–15 karakter, huruf/angka             | BVA & EP        | Valid:3/15 karakter; Invalid: 4/16 karakter      |
| Password  | Minimal 6 karakter, kombinasi karakter | BVA & EP        | Valid: ≥6, kombinasi huruf/angka/simbol           |

# BOUNDARY VALUE ANALYSIS - LOGIN

| Panjang Karakter | Input Username        | Expected Result Username | Actual Result Username | Input Password           | Expected Result Password | Actual Result Password | Status Pengujian |
| ---------------- | --------------------- | ------------------------ | ---------------------- | ------------------------ | ------------------------ | ---------------------- | ---------------- |
| 2 (min - 1)      | "us" (2)              | Invalid                  | Invalid                | "pw" (2)                 | Invalid                  | Invalid                | ✅**Passed**       |
| 3 (min)          | "usr" (3)             | Valid                    | Valid                  | "abc12" (5)              | Invalid                  | Invalid                | ✅**Passed**       |
| 6 (min + 1)      | "user01" (6)          | Valid                    | Valid                  | "abc123" (6)             | Valid                    | Valid                  | ✅**Passed**       |
| 14 (max - 1)     | "username12345" (14)  | Valid                    | Valid                  | "pass1234!" (10)         | Valid                    | Valid                  | ✅**Passed**       |
| 15 (max)         | "usernamelimit1" (15) | Valid                    | Valid                  | "P4ssword!12345" (14)    | Valid                    | Valid                  | ✅**Passed**       |
| 16 (max + 1)     | "username123456" (16) | Invalid                  | Invalid                | "password12345678!" (18) | Invalid                  | Invalid                | ✅**Passed**       |


# EQUIVALENCE PARTITIONING FORM LOGIN

**USERNAMME**
| Kelas Equivalence          | Input Username          | Panjang Karakter | Expected Result | Actual Result | Status Pengujian |
| -------------------------- | ----------------------- | ---------------- | --------------- | ------------- | ---------------- |
| < 3 karakter               | "us"                    | 2                | Invalid         | Invalid       | ✅ Passed         |
| 3–15 karakter (Valid)      | "user123"               | 7                | Valid           | Valid         | ✅ Passed         |
| > 15 karakter              | "panjangusernamebanget" | 20               | Invalid         | Invalid       | ✅ Passed         |
| Mengandung karakter khusus | "user\_name"            | 9                | Invalid         | Valid       | ❌ Failed        |
| Mengandung spasi           | "user name"             | 9                | Invalid         | Valid     | ❌ Failed        |


**PASSWORD**
| Kelas Equivalence            | Input Password        | Panjang Karakter | Expected Result | Actual Result | Status Pengujian |
| ---------------------------- | --------------------- | ---------------- | --------------- | ------------- | ---------------- |
| < 6 karakter                 | "pw1"                 | 3                | Invalid         | Invalid       | ✅ Passed         |
| 6–15 karakter + kombinasi    | "abc123"              | 6                | Valid           | Valid         | ✅ Passed         |
| > 15 karakter                | "verylongpassword123" | 20               | Invalid         | Invalid       | ✅ Passed         |
| Hanya huruf                  | "abcdef"              | 6                | Invalid         | Invalid       | ✅ Passed         |
| Hanya angka                  | "123456"              | 6                | Invalid         | Invalid       | ✅ Passed         |
| Kombinasi huruf+angka+simbol | "P4ssw0rd!"           | 9                | Valid           | Valid         | ✅ Passed         |


# TEST CASE 

| No | Test Case ID | Deskripsi                              | Input Username | Input Password | Expected Result                       | Actual Result     | Status |
| -- | ------------ | -------------------------------------- | -------------- | -------------- | ------------------------------------- | ----------------- | ------ |
| 1  | TC\_DB\_01   | Login dengan username & password valid | rehe        | rehe1234       | Login berhasil                        | Login berhasil    | ✅Passed |
| 2  | TC\_DB\_02   | Username tidak terdaftar               | unknown        | P\@ss123       | Gagal login | Gagal login       | ✅Passed |
| 3  | TC\_DB\_03   | Password salah                         | admin          | salahpass      | Gagal login           | Gagal login       | ✅Passed |
| 4  | TC\_DB\_04   | Field kosong                           | (kosong)       | P\@ss123       | Error: Username tidak boleh kosong           | Error ditampilkan | ✅Passed |



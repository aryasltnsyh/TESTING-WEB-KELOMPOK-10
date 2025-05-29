# BOUNDARY VALUE ANALYSIS - LOGIN

| Panjang Karakter | Username | Keterangan Username | Password | Keterangan Password |
| ---------------- | -------- | ------------------- | -------- | ------------------- |
| 2 (min - 1)      | Invalid  | Invalid (kurang 1)  | Invalid  | Invalid (kurang 1)  |
| 3 (min)          | Valid    | Valid               | Valid    | Valid               |
| 6 (min + 1)      | Valid    | Valid               | Valid    | Valid               |
| 14 (max - 1)     | Valid    | Valid               | Valid    | Valid               |
| 15 (max)         | Valid    | Valid               | Valid    | Valid               |
| 16 (max + 1)     | Invalid  | Invalid (lebih 1)   | Invalid  | Invalid (lebih 1)   |

# EQUIVALENCE PARTITIONING 
**FORM LOGIN**
**USERNAMME**
| Kelas Equivalence               | Contoh Input                | Status  |
| ------------------------------- | --------------------------- | ------- |
| Username kurang dari 5 karakter | "usr" (3 karakter)          | Invalid |
| Username 5 sampai 15 karakter   | "user123" (7 karakter)      | Valid   |
| Username lebih dari 15 karakter | "usernameiswaytoolong" (19) | Invalid |

**PASSWORD**
| Kelas Equivalence               | Contoh Input               | Status  |
| ------------------------------- | -------------------------- | ------- |
| Password kurang dari 5 karakter | "pwd" (3 karakter)         | Invalid |
| Password 5 sampai 15 karakter   | "pass123" (7 karakter)     | Valid   |
| Password lebih dari 15 karakter | "verylongpassword123" (18) | Invalid |

# BEHAVIOR TESTING  ❌ Failed
| ID   | Fitur | Langkah Uji                                        | Input                                                   | Expected Result                               | Actual | Status |
| ---- | ----- | -------------------------------------------------- | ------------------------------------------------------- | --------------------------------------------- | ------ | ------ |
| TC01 | Login | Kosongkan username dan password, klik tombol Login | Username: ""<br>Password: ""                            | Error: “Wajib diisi” pada kedua field         | Muncul pesan " tidak boleh kosong"        | ✅ Passed       |
| TC02 | Login | Username kurang dari 3 karakter                    | Username: "usr"<br>Password: "pass123"                  | Error: “Invalid username or password”          | Muncul pesan Invalid username or password       |   ✅ Passed     |
| TC03 | Login | Password kurang dari 6 karakter                    | Username: "user123"<br>Password: "pwd"                  | Error: “Invalid username or password”          |   Muncul pesan Invalid username or password     | ✅ Passed       |
| TC04 | Login | Username dan password valid                        | Username: "user123"<br>Password: "pass123"              | Login berhasil, redirect ke halaman dashboard |    Diarahkan ke halaman Dashboard    |   ✅ Passed     |
| TC05 | Login | Username valid, password salah                     | Username: "user123"<br>Password: "wrongpass"            | Error: “Invalid username or password”         |  Muncul pesan Invalid username or password      |    ✅ Passed    |
| TC06 | Login | Username melebihi 15 karakter                      | Username: "usernameiswaytoolong"<br>Password: "pass123" | Error: “Invalid username or password”        |   Muncul pesan Invalid username or password     | ✅ Passed       |
| TC07 | Login | Password melebihi 15 karakter                      | Username: "user123"<br>Password: "verylongpassword123"  | Error: “Invalid username or password”        |  Muncul pesan Invalid username or password      |  ✅ Passed      |
| TC08 | Login | Username benar tapi akun tidak terdaftar           | Username: "ghostuser"<br>Password: "pass123"            | Error: “Invalid username or password”                 |  Muncul pesan Invalid username or password      |  ✅ Passed      |
| TC09 | Login | Username valid, password kosong                    | Username: "user123"<br>Password: ""                     | Error: “PInvalid username or password”                 |   Muncul pesan Invalid username or password     |   ✅ Passed     |
| TC10 | Login | Username kosong, password valid                    | Username: ""<br>Password: "pass123"                     | Error: “Invalid username or password”                 |     Muncul pesan Invalid username or password   |  ✅ Passed      |



**FORM LOGIN**

**USERNAME**

| Nilai Batas | Keterangan         |
| ----------- | ------------------ |
| 4 (min-1)   | Invalid (kurang 1) |
| 5 (min)     | Valid              |
| 6 (min+1)   | Valid              |
| 14 (max-1)  | Valid              |
| 15 (max)    | Valid              |
| 16 (max+1)  | Invalid (lebih 1)  |

**PASSWORD**

| Nilai Batas | Keterangan         |
| ----------- | ------------------ |
| 4 (min-1)   | Invalid (kurang 1) |
| 5 (min)     | Valid              |
| 6 (min+1)   | Valid              |
| 14 (max-1)  | Valid              |
| 15 (max)    | Valid              |
| 16 (max+1)  | Invalid (lebih 1)  |


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


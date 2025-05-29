# Parameter Penilaian 
| Field     | Parameter Validasi                     | Jenis Pengujian | Alasan Valid/Invalid                              |
| --------- | -------------------------------------- | --------------- | ------------------------------------------------- |
| Username  | 3–15 karakter, huruf/angka             | BVA & EP        | Valid:3/15 karakter; Invalid: 4/16 karakter      |
| Password  | Minimal 6 karakter, kombinasi karakter | BVA & EP        | Valid: ≥6, kombinasi huruf/angka/simbol           |

# BOUNDARY VALUE ANALYSIS - LOGIN

| Panjang Karakter | Username | Keterangan Username | Password | Keterangan Password |
| ---------------- | -------- | ------------------- | -------- | ------------------- |
| 2 (min - 1)      | Invalid  | Invalid (kurang 1)  | Invalid  | Invalid (kurang 4)  |
| 3         | Valid    | Valid ( Tepat minimal)               | Invalid    | Invalid (kurang 3)              |
| 6 (min + 1)      | Valid    | Valid               | Valid    | Valid ( Tepat minimal              |
| 14 (max - 1)     | Valid    | Valid               | Valid    | Valid               |
| 15 (max)         | Valid    | Valid               | Valid    | Valid               |
| 16 (max + 1)     | Invalid  | Invalid (lebih 1)   | Invalid  | Invalid (lebih 1)   |

# EQUIVALENCE PARTITIONING FORM LOGIN

**USERNAMME**
| Kelas Equivalence               | Contoh Input                | Status  |
| ------------------------------- | --------------------------- | ------- |
| Username kurang dari 3 karakter | "us" (2 karakter)          | Invalid |
| Username 3 sampai 15 karakter   | "user123" (7 karakter)      | Valid   |
| Username lebih dari 15 karakter | "namauseryangpanjang" (20) | Invalid |

**PASSWORD**
| Kelas Equivalence               | Contoh Input               | Status  |
| ------------------------------- | -------------------------- | ------- |
| Password kurang dari 6 karakter | "pw" (2 karakter)         | Invalid |
| Password 6 sampai 15 karakter   | "pass123" (7 karakter)     | Valid   |
| Password lebih dari 15 karakter | "verylongpassword123" (18) | Invalid |

# TEST CASE 

| TC ID | Username Input        | Password Input        | Keterangan Data di DB        | Expected Result                                 | Catatan                               |
| ----- | --------------------- | --------------------- | ---------------------------- | ----------------------------------------------- | ------------------------------------- |
| TC11  | `user123`             | `pass123`             | Username & password cocok    | **Login berhasil**                              | Valid login                           |
| TC12  | `user123`             | `wrongpass`           | Username ada, password salah | **Error: Password salah**                       | Validasi password gagal               |
| TC13  | `wronguser`           | `pass123`             | Username tidak ada           | **Error: Username tidak ditemukan**             | Username tidak terdaftar              |
| TC14  | `us`                  | `pw`                  | -                            | **Error: Username dan password invalid**        | Panjang & validasi DB sama-sama gagal |
| TC15  | `user123456789012`    | `pass123`             | -                            | **Error: Username melebihi batas**              | Panjang username > 15                 |
| TC16  | `user123`             | `verylongpassword123` | -                            | **Error: Password melebihi batas**              | Panjang password > 15                 |
| TC17  | `namauseryangpanjang` | `pass123`             | Username tidak ada           | **Error: Username terlalu panjang & tidak ada** | Kombinasi panjang & validasi DB gagal |
| TC18  | `user123`             | (kosong)              | Username ada                 | **Error: Password wajib diisi**                 | Validasi form sebelum ke DB           |
| TC19  | (kosong)              | `pass123`             | -                            | **Error: Username wajib diisi**                 | Validasi form sebelum ke DB           |
| TC20  | `user123`             | `123`                 | Username ada                 | **Error: Password terlalu pendek**              | Gagal validasi panjang sebelum cek DB |


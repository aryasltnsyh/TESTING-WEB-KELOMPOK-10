# Kriteria Validasi tiap field
---
| Field       | Validasi                                                             |
| ----------- | -------------------------------------------------------------------- |
| Full Name   | Minimal 3 huruf, huruf & spasi                                       |
| Email       | Format email valid (contoh: [nama@email.com](mailto:nama@email.com)), tidak duplikat |
| Address     | Minimal 5 karakter, huruf/angka/simbol umum                          |
| No. Telepon | 11–13 digit angka                                                    |
| Username    | 5–15 karakter, huruf/angka, tidak duplikat                                           |
| Password    | Minimal 6 karakter, kombinasi huruf/angka                            |

# Decision Table 
---
| Rule | Full Name Valid | Email Valid | Address Valid | No. Telepon Valid | Username Valid | Password Valid | Output                  |
| ---- | --------------- | ----------- | ------------- | ----------------- | -------------- | -------------- | ----------------------- |
| R1   | ✅               | ✅           | ✅             | ✅                 | ✅              | ✅              | ✅ Registrasi berhasil   |
| R2   | ❌               | ✅           | ✅             | ✅                 | ✅              | ✅              | ❌ Gagal (Full Name)     |
| R3   | ✅               | ❌           | ✅             | ✅                 | ✅              | ✅              | ❌ Gagal (Email)         |
| R4   | ✅               | ✅           | ❌             | ✅                 | ✅              | ✅              | ❌ Gagal (Address)       |
| R5   | ✅               | ✅           | ✅             | ❌                 | ✅              | ✅              | ❌ Gagal (No. Telepon)   |
| R6   | ✅               | ✅           | ✅             | ✅                 | ❌              | ✅              | ❌ Gagal (Username)      |
| R7   | ✅               | ✅           | ✅             | ✅                 | ✅              | ❌              | ❌ Gagal (Password)      |
| R8   | ❌               | ❌           | ❌             | ❌                 | ❌              | ❌              | ❌ Gagal (Semua invalid) |

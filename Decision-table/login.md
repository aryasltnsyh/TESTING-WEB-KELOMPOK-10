# Kriteria Validasi
---
| Field    | Validasi                                  |
| -------- | ----------------------------------------- |
| Username | 5–15 karakter, huruf/angka                |
| Password | Minimal 6 karakter, kombinasi huruf/angka |
| Username <br> password | Terverifikasi

# Decision Table
---
| Rule | Username Valid | Password Valid | Output             |
| ---- | -------------- | -------------- | ------------------ |
| R1   | ✅              | ✅              | ✅ Login berhasil   |
| R2   | ❌              | ✅              | ❌ Gagal (Username) |
| R3   | ✅              | ❌              | ❌ Gagal (Password) |
| R4   | ❌              | ❌              | ❌ Gagal (Keduanya) |

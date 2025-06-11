# BOUNDARY VALUE ANALYSIS – LAPORAN
---
| Field         | Validasi Panjang/Range                       | Nilai Batas Valid         | Nilai Batas Invalid                      |
| ------------- | -------------------------------------------- | ------------------------- | ---------------------------------------- |
| Tanggal Awal  | Harus sebelum atau sama dengan Tanggal Akhir | 2024-01-01 → 2024-01-01 ✅ | 2024-01-05 → 2024-01-01 ❌ (awal > akhir) |
| Tanggal Akhir | Tidak boleh lebih kecil dari tanggal awal    | 2024-01-01 → 2024-01-10 ✅ | 2024-01-10 → 2024-01-05 ❌                |
---
# EQUIVALENCE PARTITIONING – LAPORAN
---
| Field                | Kelas Valid                                         | Kelas Invalid                              |
| -------------------- | --------------------------------------------------- | ------------------------------------------ |
| Tanggal Awal & Akhir | Tanggal valid dan dalam urutan benar (awal ≤ akhir) | Format salah, tanggal awal > akhir, kosong |
---
# test case
| TC ID     | Deskripsi                                 | Input (Tanggal Awal – Akhir)        | Expected Result                                         | Actual Result        | Status Uji | Tampilan |
|-----------|-------------------------------------------|-------------------------------------|----------------------------------------------------------|----------------------|------------|---|
| TC_LP_01  | Lihat laporan dengan tanggal sama         | 2024-06-01 – 2024-06-04             | Tampilkan transaksi tanggal 2024-06-04                    | Sesuai               | ✅         |![image](https://github.com/user-attachments/assets/403fc2b4-7cf9-44a0-bdd6-6bddf3cd7307)|
| TC_LP_02  | Lihat laporan dengan rentang tanggal valid| 2024-06-01 – 2024-06-05             | Tampilkan semua transaksi dari 1–5 Juni                   | Tidak bisa menampilkan rentang waktu               | ❌         | - 
| TC_LP_03  | Tanggal kosong                            | (kosong) – 2024-06-05               | Validasi: "Tanggal tidak boleh kosong"                   | Validasi muncul      | ✅         |![image](https://github.com/user-attachments/assets/357b5384-0d1e-4496-a603-ed54f15d3e5b)|
| TC_LP_04  | Tidak ada transaksi di rentang tanggal    | 2024-01-01 – 2024-01-05             | Muncul pesan: "Tidak ada transaksi ditemukan"            | Pesan tidak muncul         | ❌         |-


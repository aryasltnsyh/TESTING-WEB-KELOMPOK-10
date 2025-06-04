## 1. Insert Kategori

---
### a. Deskripsi Fungsional
Memungkinkan pengguna untuk menambahkan kategori baru ke dalam tabel kategori, dengan mencatat nama kategori dan tanggal input secara otomatis.


### b. Logika Insert & Fungsi
| ![](insert.png) | ![](add_kategori.png) |
|------------------|---------------------|


### c. Alur Logika Gabungan
```
graph TD
    A(Mulai - Halaman Dibuka) --> B{Klik Submit?}
    B -- Tidak --> C(Selesai - Form Ditampilkan)
    B -- Ya --> D[Panggil add_kategori()]
    D --> E{Query berhasil?}
    E -- Ya --> F[Alert "Berhasil menambahkan kategori"]
    E -- Tidak --> G[Alert "Gagal menambahkan kategori"]
    F --> H[Redirect ke halaman kategori]
    G --> H
```

### d. Test Case 
| TC | Submit Diklik? | Input `nama_kategori`     | Kategori Baru?                                                 | Expected Output                                                              |
| -- | -------------- | ------------------------- | -------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| 1  | ❌ Tidak        | -                         | -                                                              | Form tampil, tidak ada aksi                                                  |
| 2  | ✅ Ya           | `"Dewasa"`                | ✅ Ya                                                           | Alert "Berhasil menambahkan kategori", redirect                              |
| 3  | ✅ Ya           | `"Dewasa"` (sama persis)  | ✅ Ya                                                           | Alert "Berhasil menambahkan kategori", redirect                              |
| 4  | ✅ Ya           | `""` (kosong)             | ✅ Ya                                                           | Alert "Berhasil menambahkan kategori", redirect                              |


---

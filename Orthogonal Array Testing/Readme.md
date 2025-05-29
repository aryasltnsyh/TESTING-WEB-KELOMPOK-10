 Orthogonal Array Testing (OAT)

 Deskripsi Singkat
 
 Orthogonal Array Testing (OAT) adalah salah satu teknik Gray Box Testing yang digunakan untuk menguji berbagai kombinasi input secara efisien. Teknik ini cocok ketika jumlah kombinasi sangat banyak, sehingga kita tidak perlu menguji semuanya satu per satu. Dengan menggunakan array ortogonal, kita bisa memilih kombinasi yang paling mewakili seluruh kemungkinan secara statistik.

---

Aplikasi yang diuji

- Nama Aplikasi :
- Teknologi :
- Fitur yang di uji:
- Tujuan Pengujian:

---

Penerapan pada website: 
Pengujian ini dilakukan pada fitur login website. Login memiliki beberapa kombinasi input yang mungkin, seperti:
Format username
Format password
Jenis browser

Jika kita menguji semua kombinasi, akan ada 3 × 3 × 3 = 27 test case. Dengan OAT, kita hanya perlu 9 test case yang representatif.

---

Faktor dan Level
| **Faktor**          | **Level 1** | **Level 2** | **Level 3**                 |
| ------------------- | ----------- | ----------- | --------------------------- |
| **Username Format** | Valid       | Kosong      | Karakter aneh (simbol, dll) |
| **Password Format** | Valid       | Salah       | Kosong                      |
| **Browser**         | Chrome      | Firefox     | Edge                        |

---




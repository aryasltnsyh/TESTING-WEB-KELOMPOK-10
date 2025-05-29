# 🧪 Metode: Boundary Value Analysis (BVA)

### Field: Username (minimum 3 karakter, maksimum 20 karakter)
| No | Input               | Alasan                    | Expected Result           |
|----|---------------------|---------------------------|----------------------------|
| 1  | ""                  | Di bawah batas minimum    | ❌ Error: "Username wajib diisi" |
| 2  | "ab"                | Tepat batas minimum       |  ✅ Valid    |
| 3  | "abc"               | Tepat batas minimum       | ✅ Valid                    |
| 4  | 20 karakter         | Tepat batas maksimum      | ✅ Valid                    |
| 5  | 21 karakter         | Di atas batas maksimum    | ✅ Valid|

---

### Field: Password (minimum 8 karakter, maksimum 32 karakter)
| No | Input               | Alasan                    | Expected Result            |
|----|---------------------|---------------------------|-----------------------------|
| 1  | ""                  | Kosong                    | ❌ Error: "Password wajib diisi" |
| 2  | "1234567"           | Tepat batas minimum       | ✅ Valid   |
| 3  | "12345678"          | Tepat batas minimum       | ✅ Valid                     |
| 4  | 32 karakter         | Tepat batas maksimum      | ✅ Valid                     |
| 5  | 33 karakter         | Melebihi batas maksimum   | ✅ Valid |

---

# 🧪 Metode: Equivalence Partitioning (EP)

| No | Field     | Input               | Kategori                 | Expected Result           |
|----|-----------|---------------------|--------------------------|---------------------------|
| 1  | Username  | "budi123"           | Valid                    | ✅ Username diperbarui    |
| 2  | Username  | ""                  | Tidak valid (kosong)     | ❌ Error: "Username wajib diisi" |
| 3  | Username  | "ab"                | valid                    | ✅ Username diperbarui    |
| 4  | Password  | "strongP@ss123"     | Valid                    | ✅ Password diperbarui    |
| 5  | Password  | "pass"              | valid | ✅ Password diperbarui  |
| 6  | Password  | ""                  | valid     | ✅ terbaharui  |

---



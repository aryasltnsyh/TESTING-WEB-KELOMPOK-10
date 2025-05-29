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



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

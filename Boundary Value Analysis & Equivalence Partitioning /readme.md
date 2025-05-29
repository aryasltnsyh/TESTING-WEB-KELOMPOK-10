

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


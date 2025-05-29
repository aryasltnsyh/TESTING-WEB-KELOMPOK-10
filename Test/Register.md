**BOUNDARY VALUE ANALYSIS**

**FORM REGISTER**

| Field         | Validasi Panjang/Range | Nilai Batas Valid                                     | Nilai Batas Invalid                                  |
| ------------- | ---------------------- | ----------------------------------------------------- | ---------------------------------------------------- |
| **Full Name** | Minimal 3 huruf        | `3` huruf → ✅ `"San"`                                 | `2` huruf → ❌ `"Sa"`                                 |
| **Username**  | 5–15 karakter          | `5` → ✅ `"user1"`<br>`15` → ✅ `"usernamelengkap"`     | `4` → ❌ `"usr"`<br>`16` → ❌ `"usernamelengkapx"`     |
| **Password**  | Minimal 6 karakter     | `6` → ✅ `"pass12"`                                    | `5` → ❌ `"12345"`                                    |
| **Phone**     | 10–13 digit angka      | `11` → ✅ `"0812345678"`<br>`13` → ✅ `"0812345678901"` | `10` → ❌ `"0812345677"`<br>`14` → ❌ `"08123456789012"` |
| **Address**   | Minimal 5 karakter     | `5` → ✅ `"Jl.AB"`                                     | `4` → ❌ `"Jln"`                                      |

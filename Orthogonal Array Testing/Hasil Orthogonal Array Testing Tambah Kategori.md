# Tabel Hasil Pengujian(OAT) - Tambah Kategori

| **TC ID** | **Panjang**   | **Isi**           | **Eksistensi** | **Expected Result**                    |
|----------|----------------|-------------------|----------------|------------------------------------------------------------|
| TC_01   | Valid (10)      | Huruf             | Baru           | ✅ Kategori berhasil ditambahkan (TC_KAT_01)               |
| TC_02   | =3              | Huruf             | Baru           | ✅ Diterima (TC_KAT_02)                                    |
| TC_03   | =15             | Huruf             | Baru           | ✅ Diterima (TC_KAT_03)                                    |
| TC_04   | <3              | Huruf             | Baru           | ❌ Bug: Diterima, seharusnya minimal 3 karakter (TC_KAT_04)|
| TC_05   | >15             | Huruf             | Baru           | ❌ Bug: Melebihi batas, seharusnya divalidasi (TC_KAT_05)  |
| TC_06   | Kosong          | Kosong            | Baru           | ❌ Bug: Diterima walau wajib diisi (TC_KAT_06)             |
| TC_07   | Valid (6)       | Simbol saja       | Baru           | ❌ Bug: Diterima, seharusnya ditolak (TC_KAT_07)           |
| TC_08   | Valid (6)       | Huruf             | Duplikat       | ❌ Bug: Duplikat tidak divalidasi (TC_KAT_08)              |
| TC_09   | Valid (6)       | Campuran huruf+angka | Baru        | ❌ Bug (diasumsikan): Campuran harus divalidasi jika hanya huruf diizinkan |

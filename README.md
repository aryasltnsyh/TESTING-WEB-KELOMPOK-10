# TESTING-WEB-KELOMPOK-10

Aplikasi PHARMAPOS telah diuji menggunakan tiga jenis pendekatan pengujian: *White Box Testing, **Black Box Testing, dan **Grey Box Testing*. Pengujian dilakukan untuk memastikan stabilitas, keandalan, dan kesesuaian fungsi aplikasi dengan kebutuhan pengguna.
---

### ✅ 1. *White Box Testing* (Pengujian dari sisi pengembang)

* Fokus pada *struktur kode, **alur logika, dan **fungsi-fungsi internal* dari aplikasi.
* Menguji setiap cabang logika dan fungsi secara detail.
* Dilakukan langsung terhadap kode program, terutama bagian:

  * CRUD Barang (module/barang/)
  * CRUD Kategori (module/kategori/)
  * Proses Penjualan (module/penjualan/)
  * Laporan dan Nota (module/laporan/)
* Tools: Manual checking
---

### 🧪 2. *Black Box Testing* (Pengujian dari sisi pengguna)

* Fokus pada *fungsi aplikasi dari sisi UI/UX*, tanpa melihat isi kode program.
* Menggunakan skenario uji berdasarkan input dan output:

  * Input valid dan tidak valid untuk form Barang dan Kategori.
  * Simulasi transaksi penjualan dan cek apakah total & kembalian benar.
  * Cek laporan/nota apakah sesuai dengan data transaksi.
* Tools: Manual testing via browser.
* Dokumentasi uji tersedia di folder:
  📁 /blackbox/
  📸 Disertai screenshot hasil uji.

---
### ⚫ 3. *Grey Box Testing* (Pengujian dari sisi integrasi logika & antarmuka)

* Menggabungkan pendekatan Black Box dan White Box.
* Menguji alur antar modul dan dependensi, seperti:

  * Integrasi form input barang → penyimpanan di database → muncul di kasir.
  * Data laporan ditarik dari transaksi yang valid.
  * Validasi input pengguna yang juga diverifikasi di backend.
* Fokus pada pengujian antar-layer aplikasi.
---

### 📌 Catatan

* Branch khusus pengujian:
  🔀 whitebox-Testing, blackbox-Testing, greybox-Testing

Silakan lihat masing-masing folder untuk detail skenario uji, hasil, dan catatan pengujian.

---


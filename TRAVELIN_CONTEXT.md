# TRAVELIN_CONTEXT.md

## 1. Identitas Proyek

**Nama proyek:** Travelin  
**Developer:** Fakhri Azzam Nufail  
**Status:** Aplikasi web dalam tahap pengembangan  
**Framework:** Laravel 12.65.0  
**PHP:** 8.3.6 CLI  
**Database:** MariaDB  
**Database name:** `travelin_db`  
**Frontend/build:** Vite 7.3.6, Node.js 20.20.2, npm 10.8.2  
**OS pengembangan:** Linux Mint  
**Direktori proyek:** `~/project_akhir/travelin`

### Tujuan utama

Travelin adalah aplikasi sistem informasi pemesanan mobil travel antar kota dan provinsi.

Konsep utamanya:
- PT travel dapat mendaftarkan perusahaan.
- Admin memverifikasi/mengaktifkan PT.
- PT yang sudah aktif dapat masuk ke sistem.
- PT mengelola data driver dan kendaraan.
- Customer nantinya dapat melakukan pemesanan perjalanan.
- Sistem mendukung pemilihan kursi kendaraan.
- Admin mengelola dan memantau sistem.

> Travelin saat ini dikembangkan hanya oleh **Fakhri Azzam Nufail**. Jangan menganggap ada anggota tim lain sebagai developer proyek.

---

## 2. Prinsip Pengembangan

Saat mengubah atau menambahkan kode:

1. Jangan merusak fitur yang sudah berjalan.
2. Pertahankan struktur Laravel yang sudah ada kecuali memang perlu diubah.
3. Gunakan Laravel conventions dan praktik keamanan yang baik.
4. Jangan menyimpan password dalam plaintext.
5. Gunakan `Hash::make()` saat menyimpan password.
6. Gunakan `Hash::check()` saat memverifikasi password.
7. Gunakan validation Laravel pada input pengguna.
8. Gunakan middleware untuk pembatasan akses.
9. Jangan mengekspos credential, password, `.env`, atau secret key.
10. Jangan menggunakan query SQL mentah jika Eloquent/Query Builder sudah cukup.
11. Gunakan CSRF protection bawaan Laravel untuk form.
12. Setelah perubahan route/controller/configuration, gunakan `php artisan optimize:clear` jika diperlukan.
13. Jangan menggunakan `nano`; editor utama adalah **VS Code**.
14. Sebelum mengubah file penting, pahami kode yang sudah ada.
15. Jika memberikan controller/kode controller baru, selalu jelaskan:
   - tujuan controller;
   - fungsi setiap method penting;
   - route yang menggunakan controller tersebut;
   - alur data utamanya.

---

# 3. Arsitektur Role

Travelin memiliki empat role utama:

- `admin`
- `pt`
- `driver`
- `customer`

## Admin

Admin:
- dapat login langsung;
- mengakses dashboard admin;
- melihat daftar PT;
- melihat detail PT;
- menyetujui/mengaktifkan PT;
- mengelola fungsi administrasi sistem.

## PT

PT:
- melakukan registrasi perusahaan sendiri;
- memiliki akun user dengan role `pt`;
- memiliki data perusahaan pada `tb_pt`;
- tidak boleh masuk sebelum status PT aktif;
- setelah disetujui admin dapat menggunakan dashboard PT;
- nantinya mengelola driver dan kendaraan.

## Driver

Driver:
- merupakan pengemudi yang terkait dengan PT;
- nantinya memiliki data pada `tb_driver`;
- akun driver mengikuti aturan pembuatan akun yang ditetapkan sistem/PT.

## Customer

Customer:
- pengguna yang memesan perjalanan;
- nantinya dapat memilih perjalanan dan kursi;
- role default pada tabel `users` adalah `customer`.

---

# 4. Alur Registrasi PT

Alur yang sudah dirancang:

1. Pengunjung membuka halaman utama `/`.
2. Pengunjung dapat memilih registrasi PT.
3. PT mengisi:
   - nama user;
   - email;
   - password;
   - nama PT;
   - nomor telepon;
   - alamat.
4. Sistem melakukan validation.
5. Sistem membuat user dengan role `pt`.
6. Sistem membuat data PT pada `tb_pt`.
7. Status PT awal belum aktif/pending.
8. User melihat keterangan bahwa PT berhasil mendaftar dan menunggu konfirmasi admin.
9. Admin melihat PT pada halaman daftar PT.
10. Admin membuka detail PT.
11. Admin menekan tombol persetujuan.
12. Status PT berubah menjadi `aktif`.
13. PT baru dapat login/masuk ke sistem.

Admin tidak perlu mengaktifkan PT melalui URL secara manual. Persetujuan dilakukan melalui tombol di aplikasi.

---

# 5. Database

## Tabel `users`

Struktur target:

- `id`
- `name`
- `email` — unique
- `password`
- `role` — default `customer`

Tidak menggunakan:
- `email_verified_at`
- `remember_token`
- `id_pt`
- `id_driver`

Relasi user ke PT menggunakan `tb_pt.id_user`.

### Model User

Model `User` memiliki:
- `$fillable`: `name`, `email`, `password`, `role`
- relasi:
  - `pt()` → `hasOne(TbPt::class, 'id_user')`

Password wajib disimpan menggunakan hashing Laravel.

Contoh:

```php
'password' => Hash::make($request->password)
```

Saat login/verifikasi:

```php
Hash::check($request->password, $user->password)
```

---

## Tabel `tb_pt`

Field utama:

- `id_pt` — primary key
- `id_user` — foreign key ke `users.id`
- `nm_pt`
- `telp`
- `alamat`
- `status`

Status PT digunakan untuk menentukan apakah PT sudah disetujui.

Status penting:
- pending/belum aktif
- `aktif`

PT dengan status selain aktif tidak boleh masuk sebagai PT.

---

## Tabel `tb_driver`

Sudah ada migration batch 3.

Digunakan untuk data driver dan nantinya akan dikembangkan sesuai kebutuhan sistem.

---

## Tabel `tb_kendaraan`

Sudah ada migration batch 4.

Digunakan untuk data kendaraan travel.

---

## Migration yang sudah ada

- users/cache/jobs — batch 1
- `create_tb_pt_table` — batch 2
- `create_tb_driver_table` — batch 3
- `create_tb_kendaraan_table` — batch 4

Database:
`travelin_db`

---

# 6. Middleware

## RoleMiddleware

Tujuan:
- memastikan user sudah login;
- memastikan role user sesuai dengan role yang diizinkan.

Alur:
1. Jika belum login → akses ditolak/diarahkan sesuai konfigurasi.
2. Jika role tidak sesuai → HTTP 403.

Gunakan exact role checking, jangan memberikan akses hanya berdasarkan keberadaan akun.

---

## PtMiddleware

Tujuan:
- memastikan hanya PT yang valid dan aktif yang dapat menggunakan area PT.

Alur:
1. Cek user sudah login.
2. Cek role harus `pt`.
3. Cari `TbPt` berdasarkan:
   `id_user = auth()->id()`.
4. Jika data PT tidak ditemukan → logout/akses ditolak.
5. Jika status PT belum `aktif` → logout/akses ditolak.
6. Jika PT aktif → lanjut ke dashboard PT.

---

# 7. Controller yang Sudah Ada

## `Controller.php`

Base controller Laravel.

---

## `Admin/DashboardController.php`

Tujuan:
menangani dashboard admin.

Method utama:

### `TampilDashboardAdminFunction()`

Menampilkan dashboard admin.

Route:
```text
/admin/dashboard
```

Name:
```text
admin.dashboard
```

---

## `PtController.php`

Tujuan:
menangani data PT pada area admin.

### `TampilDataPtFunction()`

Menampilkan daftar PT.

Saat ini menggunakan konsep:

```php
TbPt::with('user')->latest()->get()
```

### `TampilDetailPtFunction()`

Menampilkan detail PT.

Data PT dapat melakukan:

```php
$pt->load('user')
```

### Approve PT

Endpoint:
```text
PATCH /admin/pt/{pt}/approve
```

Fungsi:
- mengubah status PT menjadi `aktif`.

---

## `PtRegistrationController.php`

Tujuan:
menangani registrasi PT dari halaman publik.

Method:

### `TampilFormRegistrasiPtFunction()`

Menampilkan form registrasi PT.

View:
```text
auth.pt-register
```

Route:
```text
GET /pt/register
```

### `SimpanRegistrasiPtFunction()`

Memproses form registrasi PT.

Melakukan:
- validation;
- membuat user role `pt`;
- membuat data `TbPt`;
- memberikan status awal belum aktif/pending;
- mengarahkan user ke hasil registrasi.

Validasi mencakup:
- name;
- email;
- password;
- nama PT;
- telp;
- alamat.

Password wajib di-hash.

---

## `LoginController.php`

Menangani proses login.

Aturan penting:
- admin dapat login langsung;
- PT hanya boleh masuk jika status PT `aktif`;
- kredensial harus diverifikasi secara aman;
- jangan pernah membandingkan password plaintext dengan isi database secara langsung.

---

# 8. Routes

Struktur route yang sudah dirancang:

## Public

```text
GET /
```

Menampilkan welcome/landing page Travelin.

Halaman ini menjelaskan:
- apa itu Travelin;
- fungsi utama aplikasi;
- konsep pemesanan mobil travel;
- PT dapat mendaftarkan perusahaan.

---

## Registrasi PT

```text
GET  /pt/register
POST /pt/register
```

Controller:

```text
PtRegistrationController
```

Methods:

```text
TampilFormRegistrasiPtFunction
SimpanRegistrasiPtFunction
```

View:

```text
auth.pt-register
```

---

## Admin

```text
GET /admin/dashboard
```

Controller:

```text
Admin\DashboardController
```

Method:

```text
TampilDashboardAdminFunction
```

Name:

```text
admin.dashboard
```

Admin routes dilindungi authentication + role admin.

---

## PT management

```text
GET /admin/pt
GET /admin/pt/{pt}
PATCH /admin/pt/{pt}/approve
```

Controller:

```text
PtController
```

Methods:
- `TampilDataPtFunction`
- `TampilDetailPtFunction`
- method approve

Route admin wajib dilindungi middleware admin.

---

# 9. View/Layout

## Admin layout

File:

```text
resources/views/layouts/admin.blade.php
```

Digunakan untuk area admin.

Dashboard admin memiliki:
- sidebar;
- navigation;
- cards;
- icon;
- layout modern;
- tampilan dashboard.

Catatan:
- gunakan icon library, bukan emoji, untuk icon UI;
- desain modern/luxury;
- jangan mengubah struktur visual yang sudah disetujui tanpa alasan.

---

## PT layout

Direncanakan menggunakan:

```text
resources/views/layouts/pt.blade.php
```

PT harus mempunyai layout/sidebar sendiri dan **tidak menggunakan sidebar admin**.

---

## Welcome page

Route:

```text
/
```

View:

```text
welcome.blade.php
```

Tujuan:
- halaman publik;
- memperkenalkan Travelin;
- memberikan akses ke registrasi PT/login;
- tidak langsung membuka dashboard admin.

---

## PT registration

View:

```text
resources/views/auth/pt-register.blade.php
```

Desain:
- modern;
- icon field menggunakan icon, bukan emoji;
- logo Travelin;
- input password;
- konfirmasi password;
- informasi setelah registrasi berhasil.

Setelah berhasil daftar, tampilkan pesan yang menjelaskan:

> PT Anda berhasil mendaftar dan sedang menunggu konfirmasi admin.

---

# 10. UI/UX

Arah desain Travelin:

- modern;
- elegan;
- profesional;
- sedikit nuansa luxury;
- bersih;
- responsive;
- tidak menggunakan emoji sebagai icon UI.

Logo:
- konsep kendaraan/travel car/van;
- sederhana;
- elegan;
- dapat digunakan tanpa tulisan;
- background transparan jika diperlukan.

Login:
- desain modern;
- liquid-glass style;
- terpisah dari desain dashboard admin.

Dashboard:
- sidebar;
- cards;
- icon;
- layout modern.

---

# 11. Fitur Kendaraan dan Kursi

Travelin akan memiliki sistem kendaraan travel.

Konsep tampilan kendaraan:
- posisi driver di bagian depan;
- kursi penumpang bernomor:
  - 01
  - 02
  - 03
  - 04
  - 05
  - 06
  - 07
  - 08

Pemilihan kursi nantinya harus terhubung dengan:
- kendaraan;
- perjalanan/booking;
- status kursi;
- customer.

Jangan membuat seat selection hanya sebagai UI tanpa mempertimbangkan integritas database.

Jika sistem booking sudah dibuat, harus mencegah dua customer mengambil kursi yang sama.

---

# 12. Rencana Modul Selanjutnya

Prioritas pengembangan setelah fondasi auth/PT:

### Tahap 1 — Auth dan role
- login;
- logout;
- middleware;
- role;
- PT approval.

### Tahap 2 — Dashboard PT
- layout PT;
- dashboard PT;
- informasi status perusahaan.

### Tahap 3 — Driver
- CRUD driver;
- relasi driver dengan PT;
- akun driver jika diperlukan.

### Tahap 4 — Kendaraan
- CRUD kendaraan;
- relasi kendaraan dengan PT;
- kapasitas;
- nomor kendaraan;
- status kendaraan.

### Tahap 5 — Rute/perjalanan
- kota asal;
- kota tujuan;
- tanggal;
- jam;
- kendaraan;
- driver;
- tarif.

### Tahap 6 — Booking customer
- memilih perjalanan;
- memilih kursi;
- data penumpang;
- konfirmasi booking.

### Tahap 7 — Pengelolaan booking
- PT melihat booking;
- driver melihat jadwal;
- customer melihat riwayat booking;
- status booking.

### Tahap 8 — Pembayaran
Jika akan diterapkan:
- metode pembayaran;
- status pembayaran;
- integrasi payment gateway bila diperlukan.

### Tahap 9 — Security hardening
Sebelum production:
- HTTPS;
- rate limiting;
- security headers;
- secure session;
- validasi upload;
- audit log;
- backup database;
- monitoring;
- error handling production;
- pengujian authorization;
- vulnerability testing.

---

# 13. Security Rules

Travelin harus mengikuti prinsip:

## Password

Jangan:

```php
'password' => $request->password
```

Gunakan:

```php
'password' => Hash::make($request->password)
```

Untuk pemeriksaan:

```php
Hash::check($request->password, $user->password)
```

---

## Authorization

Jangan hanya memeriksa:

```php
auth()->check()
```

untuk halaman khusus.

Pastikan role dan ownership diperiksa.

Contoh:
- admin hanya admin;
- PT hanya PT;
- PT hanya mengakses data milik PT tersebut;
- customer hanya melihat booking miliknya;
- driver hanya melihat data yang memang menjadi haknya.

---

## Mass Assignment

Gunakan `$fillable` atau `$guarded` dengan benar.

Jangan menerima field sensitif langsung dari request tanpa validation.

---

## Validation

Semua input user harus divalidasi.

Termasuk:
- email;
- password;
- nama;
- nomor telepon;
- alamat;
- ID relasi;
- upload file;
- booking;
- kursi.

---

## CSRF

Gunakan:

```blade
@csrf
```

untuk form POST/PUT/PATCH/DELETE.

---

## SQL Injection

Utamakan:
- Eloquent;
- Query Builder.

Jangan memasukkan input user langsung ke raw SQL.

---

# 14. Environment

`.env` tidak boleh di-commit atau dibagikan.

Contoh informasi sensitif yang tidak boleh masuk repository:

```text
DB_PASSWORD
APP_KEY
API keys
payment keys
mail passwords
tokens
```

Production:

```text
APP_ENV=production
APP_DEBUG=false
```

Jangan mengaktifkan `APP_DEBUG=true` pada server produksi.

---

# 15. Development Commands

Direktori:

```bash
cd ~/project_akhir/travelin
```

Development server lokal:

```bash
php artisan serve
```

Untuk akses dari perangkat lain pada jaringan lokal:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Build frontend:

```bash
npm run build
```

Development Vite:

```bash
npm run dev
```

Membersihkan cache/config/route/view:

```bash
php artisan optimize:clear
```

Melihat route:

```bash
php artisan route:list
```

---

# 16. Teknologi yang Digunakan

- Laravel 12.65.0
- PHP 8.3.6
- MariaDB
- MySQL/MariaDB melalui XAMPP/LAMPP
- Node.js 20.20.2
- npm 10.8.2
- Vite 7.3.6
- Tailwind CSS 4
- AdminLTE
- Blade
- Eloquent ORM
- Linux Mint
- VS Code

AI development environment yang pernah digunakan:
- Ollama 0.32.13
- model `qwen2.5-coder:7b`

---

# 17. Aturan Penamaan

User menyukai nama method controller yang deskriptif dalam bahasa Indonesia.

Contoh:

```text
TampilDashboardAdminFunction
TampilFormRegistrasiPtFunction
SimpanRegistrasiPtFunction
TampilDataPtFunction
TampilDetailPtFunction
```

Jika menambahkan method baru, pertahankan gaya penamaan yang konsisten kecuali ada alasan teknis kuat untuk menggunakan konvensi lain.

---

# 18. Aturan untuk Codex

Saat bekerja pada repository Travelin:

1. Baca `TRAVELIN_CONTEXT.md` terlebih dahulu.
2. Periksa file yang akan diubah sebelum melakukan perubahan.
3. Jangan menghapus fitur yang sudah ada tanpa alasan.
4. Jangan mengganti desain UI secara besar-besaran tanpa diminta.
5. Jangan mengganti nama tabel/database tanpa alasan.
6. Jangan mengubah role tanpa persetujuan developer.
7. Jangan membuat akun admin secara sembarangan.
8. Jangan menonaktifkan middleware keamanan untuk mempermudah testing.
9. Jika ada error, cari akar masalah sebelum membuat workaround.
10. Setelah perubahan, jelaskan file yang diubah.
11. Untuk controller baru/perubahan controller, jelaskan tujuan controller dan method pentingnya.
12. Jika perubahan menyentuh database, jelaskan migration dan relasinya.
13. Jika route berubah, cek dengan `php artisan route:list`.
14. Jika konfigurasi/cache bermasalah, pertimbangkan `php artisan optimize:clear`.
15. Gunakan VS Code sebagai editor utama.
16. Jangan menggunakan `nano`.
17. Jangan membuat fitur di luar scope Travelin tanpa diminta.
18. Jika ada ketidakjelasan requirement, jangan mengarang aturan bisnis yang penting; tandai bagian yang perlu dikonfirmasi.

---

# 19. Status Pengembangan Saat Ini

Fondasi yang sudah tersedia:

- Laravel berhasil berjalan.
- Database `travelin_db` sudah digunakan.
- Migration users/cache/jobs sudah ada.
- `tb_pt` sudah ada.
- `tb_driver` sudah ada.
- `tb_kendaraan` sudah ada.
- Login admin sudah bekerja.
- Logout sudah tersedia.
- Akses dashboard admin sudah dilindungi.
- Role middleware sudah ada.
- PT middleware sudah ada.
- Registrasi PT sudah dirancang/dibuat.
- Admin dapat melihat daftar PT.
- Admin dapat melihat detail PT.
- Admin dapat menyetujui PT.
- PT yang belum aktif tidak boleh masuk.
- Welcome page publik sedang menjadi halaman utama `/`.
- Layout admin sudah tersedia.
- Layout PT perlu dikembangkan/diteruskan.
- Modul driver, kendaraan, perjalanan, booking, kursi, dan pembayaran masih perlu dikembangkan lebih lanjut.

---

# 20. Target Akhir Travelin

Travelin diharapkan menjadi sistem pemesanan mobil travel antar kota/provinsi yang memiliki:

```text
Pengunjung
    ↓
Welcome Page
    ↓
Login / Registrasi PT
    ↓
+-----------------------+
|                       |
|        ADMIN          |
|                       |
| PT Approval           |
| Management            |
| Monitoring            |
|                       |
+-----------------------+

PT
 ↓
Dashboard PT
 ↓
Driver
 ↓
Kendaraan
 ↓
Perjalanan
 ↓
Booking

Customer
 ↓
Cari perjalanan
 ↓
Pilih perjalanan
 ↓
Pilih kursi
 ↓
Booking
 ↓
Pembayaran
 ↓
Tiket/riwayat booking
```

Fokus utama adalah membangun sistem yang:
- aman;
- mudah digunakan;
- memiliki pemisahan role yang jelas;
- memiliki database yang terstruktur;
- dapat dikembangkan menjadi aplikasi produksi.

---

## 21. Catatan Penting

Dokumen ini adalah konteks proyek, bukan pengganti source code.

Jika kondisi source code berbeda dengan dokumen ini:
1. prioritaskan source code yang benar-benar ada;
2. periksa migration/model/controller/route terkait;
3. jangan mengasumsikan fitur sudah selesai hanya karena tercantum di dokumen;
4. perbarui dokumen ini jika struktur proyek berubah secara signifikan.

Tanggal pembuatan konteks:
25 September 2026

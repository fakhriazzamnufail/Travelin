# Travelin

Travelin adalah aplikasi web untuk sistem pemesanan mobil travel antar kota dan provinsi. Proyek ini dikembangkan untuk mengelola proses registrasi perusahaan travel, verifikasi admin, pengelolaan driver dan kendaraan, serta rencana pemesanan perjalanan oleh customer.

## Tentang Proyek

Travelin dikembangkan sebagai aplikasi web berbasis Laravel dengan arsitektur role-based access.

Pengembangan proyek saat ini dilakukan oleh:

**Fakhri Azzam Nufail**

### Tujuan Utama

Travelin dirancang untuk menyediakan alur:

```text
Pengunjung
    ↓
Welcome Page
    ↓
Registrasi PT / Login
    ↓
PT mendaftar
    ↓
Admin melakukan verifikasi
    ↓
PT menjadi aktif
    ↓
PT mengelola driver & kendaraan
    ↓
Perjalanan tersedia
    ↓
Customer mencari perjalanan
    ↓
Customer memilih kursi
    ↓
Booking
    ↓
Pembayaran
```

> Beberapa modul pada alur di atas masih dalam tahap pengembangan dan belum seluruhnya tersedia pada versi saat ini.

---

## Fitur Utama

### Sudah tersedia / sudah dibangun

- Welcome/landing page publik
- Login
- Logout
- Role-based access
- Dashboard admin
- Registrasi PT
- Data PT
- Detail PT
- Persetujuan/aktivasi PT oleh admin
- Middleware role
- Middleware khusus PT
- Password hashing
- Validasi form registrasi
- Struktur database untuk PT, driver, dan kendaraan

### Dalam pengembangan

- Dashboard PT
- CRUD driver
- CRUD kendaraan
- Pengelolaan perjalanan/rute
- Booking customer
- Pemilihan kursi
- Riwayat booking
- Pengelolaan status booking
- Pembayaran
- Tiket/konfirmasi perjalanan
- Fitur keamanan dan hardening untuk production

---

## Role Pengguna

Travelin menggunakan empat role utama:

| Role | Fungsi |
|---|---|
| `admin` | Mengelola sistem, memverifikasi PT, dan melakukan administrasi |
| `pt` | Mengelola perusahaan travel, driver, kendaraan, dan nantinya perjalanan |
| `driver` | Mengakses data dan jadwal yang berkaitan dengan driver |
| `customer` | Mencari perjalanan dan melakukan booking |

### Aturan PT

PT dapat melakukan registrasi sendiri.

Setelah registrasi:

```text
Registrasi PT
      ↓
Status menunggu/pending
      ↓
Admin memeriksa
      ↓
Admin menyetujui
      ↓
Status = aktif
      ↓
PT dapat login
```

PT yang belum aktif tidak boleh menggunakan area PT.

---

## Teknologi

### Backend

- Laravel 12.65.0
- PHP 8.3.6
- Eloquent ORM
- Blade

### Database

- MariaDB
- Database: `travelin_db`

### Frontend / Build

- Vite 7.3.6
- Node.js 20.20.2
- npm 10.8.2
- Tailwind CSS 4
- AdminLTE

### Environment Pengembangan

- Linux Mint
- Visual Studio Code

Tools AI/coding yang pernah digunakan selama pengembangan:

- Ollama 0.32.13
- `qwen2.5-coder:7b`

---

## Persyaratan Sistem

Sebelum menjalankan Travelin, pastikan sudah tersedia:

- PHP 8.3 atau kompatibel dengan project
- Composer
- Node.js
- npm
- MariaDB/MySQL
- Git (disarankan)
- Laravel dependencies dari `composer install`

---

## Instalasi

### 1. Clone atau salin project

Contoh:

```bash
cd ~/project_akhir
```

Pastikan project berada pada:

```text
~/project_akhir/travelin
```

Masuk ke folder project:

```bash
cd ~/project_akhir/travelin
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency frontend

```bash
npm install
```

### 4. Siapkan file environment

Buat `.env` dari template jika belum tersedia:

```bash
cp .env.example .env
```

Lalu sesuaikan konfigurasi database.

Contoh:

```env
APP_NAME=Travelin
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travelin_db
DB_USERNAME=root
DB_PASSWORD=
```

> Nilai `DB_USERNAME` dan `DB_PASSWORD` harus disesuaikan dengan konfigurasi MariaDB/MySQL di komputer masing-masing.

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Migrasi database

Jika database masih kosong dan migration project siap digunakan:

```bash
php artisan migrate
```

Jika menggunakan database dump yang sudah tersedia, import database sesuai kebutuhan proyek lalu pastikan konfigurasi `.env` sesuai.

### 7. Bersihkan cache Laravel

```bash
php artisan optimize:clear
```

### 8. Jalankan Vite

Untuk development frontend:

```bash
npm run dev
```

### 9. Jalankan Laravel

```bash
php artisan serve
```

Aplikasi biasanya dapat diakses pada:

```text
http://127.0.0.1:8000
```

---

## Akses dari Perangkat Lain di Jaringan Lokal

Untuk mengakses aplikasi dari perangkat lain pada jaringan lokal:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Kemudian gunakan alamat IP komputer server, misalnya:

```text
http://192.168.x.x:8000
```

> Perintah ini cocok untuk jaringan lokal. Agar aplikasi dapat diakses melalui internet, diperlukan konfigurasi deployment/tunneling/server yang sesuai.

---

## Struktur Project

Struktur utama Laravel:

```text
travelin/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── ...
├── database/
│   ├── migrations/
│   └── ...
├── resources/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       └── ...
├── routes/
│   └── web.php
├── public/
├── storage/
├── tests/
├── .env
├── artisan
├── composer.json
├── package.json
├── README.md
└── TRAVELIN_CONTEXT.md
```

---

## Database

Database utama:

```text
travelin_db
```

Tabel yang sudah disiapkan dalam pengembangan:

### `users`

Digunakan untuk autentikasi pengguna.

Field utama:

```text
id
name
email
password
role
```

Role default:

```text
customer
```

### `tb_pt`

Digunakan untuk menyimpan data perusahaan travel.

Field utama:

```text
id_pt
id_user
nm_pt
telp
alamat
status
```

### `tb_driver`

Digunakan untuk menyimpan data driver.

### `tb_kendaraan`

Digunakan untuk menyimpan data kendaraan.

---

## Autentikasi dan Keamanan

Travelin menggunakan mekanisme keamanan Laravel.

### Password

Password tidak boleh disimpan sebagai plaintext.

Gunakan:

```php
Hash::make($password)
```

Untuk pengecekan:

```php
Hash::check($password, $hashedPassword)
```

### CSRF

Form yang melakukan POST/PATCH/DELETE harus menggunakan CSRF protection Laravel:

```blade
@csrf
```

### Authorization

Akses halaman tidak cukup hanya dengan memeriksa apakah user sudah login.

Role juga harus diperiksa.

Contoh:

```text
admin → area admin
pt → area PT
driver → area driver
customer → area customer
```

### PT Authorization

PT hanya boleh masuk apabila:

1. user login;
2. role = `pt`;
3. data PT ditemukan;
4. status PT = `aktif`.

### Environment Security

Jangan memasukkan informasi rahasia ke repository, termasuk:

- password database
- `APP_KEY`
- API key
- token
- secret payment gateway
- credential email

File `.env` harus dijaga tetap privat.

---

## Route Utama

### Halaman publik

```text
GET /
```

Menampilkan welcome page Travelin.

### Registrasi PT

```text
GET  /pt/register
POST /pt/register
```

### Dashboard Admin

```text
GET /admin/dashboard
```

Nama route:

```text
admin.dashboard
```

### Manajemen PT oleh Admin

```text
GET   /admin/pt
GET   /admin/pt/{pt}
PATCH /admin/pt/{pt}/approve
```

> Route dapat bertambah seiring perkembangan modul.

---

## Controller Utama

### `Admin\DashboardController`

Method utama:

```text
TampilDashboardAdminFunction()
```

Digunakan untuk menampilkan dashboard admin.

### `PtController`

Method yang digunakan antara lain:

```text
TampilDataPtFunction()
TampilDetailPtFunction()
```

Controller ini menangani data PT pada area admin, termasuk proses approval PT.

### `PtRegistrationController`

Method:

```text
TampilFormRegistrasiPtFunction()
SimpanRegistrasiPtFunction()
```

Controller ini menangani pendaftaran PT dari sisi publik.

### `LoginController`

Menangani proses login dan aturan autentikasi.

---

## View dan Layout

### Admin

Layout:

```text
resources/views/layouts/admin.blade.php
```

### PT

Layout yang direncanakan:

```text
resources/views/layouts/pt.blade.php
```

PT harus menggunakan layout sendiri dan tidak menggunakan sidebar admin.

### Registrasi PT

```text
resources/views/auth/pt-register.blade.php
```

### Welcome Page

```text
resources/views/welcome.blade.php
```

---

## Aturan UI/UX

Arah desain Travelin:

- modern
- profesional
- elegan
- clean
- responsive
- menggunakan icon, bukan emoji, untuk icon antarmuka
- konsisten antarhalaman

Login dirancang dengan gaya modern/liquid-glass.

Dashboard dirancang dengan sidebar, cards, icon, dan layout modern.

---

## Sistem Kursi

Konsep kursi kendaraan yang direncanakan:

```text
        DRIVER
      ┌─────────┐
      │         │
      └─────────┘

   01        02
   03        04
   05        06
   07        08
```

Implementasi final dapat disesuaikan dengan jenis kendaraan.

Sistem booking harus memastikan satu kursi tidak dapat dipesan oleh dua customer pada perjalanan yang sama.

---

## Perintah Development yang Sering Digunakan

Masuk ke project:

```bash
cd ~/project_akhir/travelin
```

Menjalankan Laravel:

```bash
php artisan serve
```

Menjalankan Laravel di semua interface:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Menjalankan Vite:

```bash
npm run dev
```

Build frontend:

```bash
npm run build
```

Membersihkan cache:

```bash
php artisan optimize:clear
```

Melihat daftar route:

```bash
php artisan route:list
```

Melihat status migration:

```bash
php artisan migrate:status
```

---

## Pedoman Pengembangan

Saat mengembangkan Travelin:

1. Jangan merusak fitur yang sudah berjalan.
2. Periksa source code sebelum mengubahnya.
3. Gunakan validation Laravel.
4. Gunakan middleware untuk authorization.
5. Gunakan Eloquent/Query Builder untuk database.
6. Jangan menyimpan password dalam plaintext.
7. Jangan mengekspos `.env`.
8. Jangan mengubah role tanpa alasan yang jelas.
9. Jangan menghapus fitur lama hanya untuk menyelesaikan error.
10. Pertahankan konsistensi UI.
11. Gunakan VS Code sebagai editor utama.
12. Jangan menggunakan `nano`.
13. Setelah perubahan route/configuration, gunakan command Laravel yang sesuai untuk membersihkan cache jika diperlukan.
14. Jika menambahkan controller, jelaskan fungsi controller dan method pentingnya.
15. Jika mengubah database, perbarui migration dan relasi yang terkait.

---

## Status Pengembangan

Fondasi utama yang sudah dibangun:

- [x] Laravel project
- [x] Database `travelin_db`
- [x] Migration `users`
- [x] `tb_pt`
- [x] `tb_driver`
- [x] `tb_kendaraan`
- [x] Login admin
- [x] Logout
- [x] Role middleware
- [x] PT middleware
- [x] Registrasi PT
- [x] Daftar PT
- [x] Detail PT
- [x] Approval PT
- [x] Welcome page publik
- [x] Layout admin
- [ ] Layout PT final
- [ ] CRUD driver lengkap
- [ ] CRUD kendaraan lengkap
- [ ] Modul perjalanan
- [ ] Modul booking
- [ ] Pemilihan kursi terintegrasi database
- [ ] Riwayat booking
- [ ] Pembayaran
- [ ] Tiket/konfirmasi perjalanan
- [ ] Security hardening production
- [ ] Deployment production

Status checklist harus diperbarui mengikuti source code yang benar-benar tersedia.

---

## Dokumentasi Pengembangan AI

Project memiliki file:

```text
TRAVELIN_CONTEXT.md
```

File tersebut berisi konteks proyek yang lebih rinci untuk membantu tools AI/coding assistant memahami:

- aturan bisnis
- role
- database
- middleware
- controller
- route
- UI/UX
- roadmap
- aturan coding
- security rules
- status pengembangan

Saat menggunakan Codex atau coding assistant:

```text
Baca TRAVELIN_CONTEXT.md terlebih dahulu sebelum mengubah kode.
```

Jika isi `TRAVELIN_CONTEXT.md` berbeda dengan source code aktual, source code yang benar-benar ada harus diperiksa terlebih dahulu dan menjadi acuan teknis.

---

## Roadmap

### Tahap 1 — Fondasi

```text
Authentication
Role
Middleware
PT registration
PT approval
```

### Tahap 2 — PT

```text
PT Dashboard
Driver Management
Vehicle Management
```

### Tahap 3 — Perjalanan

```text
Route
Schedule
Driver assignment
Vehicle assignment
Tariff
```

### Tahap 4 — Customer

```text
Search trip
Trip detail
Seat selection
Booking
Booking history
```

### Tahap 5 — Pembayaran

```text
Payment
Payment status
Confirmation
Ticket
```

### Tahap 6 — Production

```text
HTTPS
Rate limiting
Security headers
Secure session
Backup
Logging
Monitoring
Testing
Deployment
```

---

## Catatan

README ini menjelaskan kondisi dan arsitektur proyek secara umum.

README bukan pengganti source code, migration, atau dokumentasi teknis rinci.

Dokumentasi harus diperbarui ketika terdapat perubahan besar pada:

- database
- role
- authentication
- route
- controller
- middleware
- business logic
- UI
- deployment

---

## Developer

**Fakhri Azzam Nufail**

Project:

**Travelin**

Fokus:

**Sistem pemesanan mobil travel antar kota dan provinsi**

---

## Lisensi

Lisensi proyek belum ditentukan.

Jika proyek akan dipublikasikan atau digunakan secara komersial, tentukan lisensi dan ketentuan penggunaan sebelum repository dibuka untuk umum.
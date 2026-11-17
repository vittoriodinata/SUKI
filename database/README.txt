# SUKI - Database Documentation

## 1. Database Overview

SUKI merupakan platform yang dirancang untuk membantu mahasiswa menemukan dan mengikuti berbagai kompetisi, seperti hackathon, business case competition, design competition, dan kompetisi lainnya.

Database SUKI menggunakan **MySQL** sebagai sistem manajemen basis data dan **Laravel Eloquent ORM** untuk mengelola interaksi antara aplikasi dengan database.

### Database Configuration

| Configuration | Value |
|---|---|
| Database Management System | MySQL |
| Framework | Laravel 12 |
| Database Name | `SUKI` |
| Host | `127.0.0.1` |
| Port | `3307` |
| Database Connection | `mysql` |

## 2. Database Structure

Database SUKI terdiri dari 19 tabel utama yang saling terhubung untuk mendukung fitur utama aplikasi.

### 2.1 Table Description

| No. | Table | Description |
|---|---|---|
| 1 | `universities` | Menyimpan informasi universitas pengguna. |
| 2 | `users` | Menyimpan informasi akun dan profil pengguna. |
| 3 | `organizers` | Menyimpan informasi penyelenggara kompetisi. |
| 4 | `categories` | Menyimpan kategori kompetisi. |
| 5 | `competitions` | Menyimpan informasi utama kompetisi. |
| 6 | `competition_requirements` | Menyimpan persyaratan untuk setiap kompetisi. |
| 7 | `bookmarks` | Menyimpan kompetisi yang ditandai oleh pengguna. |
| 8 | `teams` | Menyimpan informasi tim yang dibentuk untuk kompetisi. |
| 9 | `team_members` | Menghubungkan pengguna dengan tim yang diikuti. |
| 10 | `registrations` | Menyimpan data pendaftaran pengguna atau tim ke kompetisi. |
| 11 | `notifications` | Menyimpan notifikasi untuk pengguna. |
| 12 | `deadline_reminders` | Menyimpan pengingat deadline kompetisi. |
| 13 | `user_preferences` | Menyimpan preferensi pengguna. |
| 14 | `recommendations` | Menyimpan rekomendasi kompetisi untuk pengguna. |
| 15 | `ability_assessments` | Menyimpan hasil penilaian kemampuan pengguna. |
| 16 | `team_reviews` | Menyimpan ulasan antaranggota atau terkait tim. |
| 17 | `achievements` | Menyimpan pencapaian pengguna. |
| 18 | `preparation_resources` | Menyimpan sumber belajar dan persiapan kompetisi. |
| 19 | `saved_searches` | Menyimpan pencarian kompetisi yang disimpan pengguna. |

Selain 19 tabel utama, Laravel juga menggunakan tabel pendukung seperti `migrations` dan `personal_access_tokens`.

## 3. Database Relationships

Relasi antartabel menggunakan Primary Key (PK) dan Foreign Key (FK) untuk menjaga konsistensi data.

### 3.1 Main Relationships

- `universities` → `users`: Satu universitas dapat memiliki banyak pengguna.
- `organizers` → `competitions`: Satu organizer dapat menyelenggarakan banyak kompetisi.
- `categories` → `competitions`: Satu kategori dapat memiliki banyak kompetisi.
- `competitions` → `competition_requirements`: Satu kompetisi dapat memiliki banyak persyaratan.
- `users` → `bookmarks`: Satu pengguna dapat memiliki banyak bookmark.
- `users` → `registrations`: Satu pengguna dapat memiliki banyak registrasi.
- `competitions` → `registrations`: Satu kompetisi dapat memiliki banyak registrasi.
- `competitions` → `teams`: Satu kompetisi dapat memiliki banyak tim.
- `teams` → `team_members`: Satu tim dapat memiliki banyak anggota.
- `users` → `team_members`: Satu pengguna dapat menjadi anggota tim.
- `users` → `notifications`: Satu pengguna dapat menerima banyak notifikasi.
- `users` → `deadline_reminders`: Satu pengguna dapat memiliki banyak pengingat deadline.
- `users` → `recommendations`: Satu pengguna dapat menerima banyak rekomendasi.
- `users` → `ability_assessments`: Satu pengguna dapat memiliki banyak hasil penilaian kemampuan.
- `users` → `achievements`: Satu pengguna dapat memiliki banyak pencapaian.
- `teams` → `team_reviews`: Satu tim dapat memiliki banyak ulasan.
- `categories` → `preparation_resources`: Satu kategori dapat memiliki banyak sumber persiapan.
- `competitions` → `preparation_resources`: Satu kompetisi dapat memiliki sumber persiapan.
- `users` → `user_preferences`: Preferensi disimpan berdasarkan pengguna.
- `users` → `saved_searches`: Satu pengguna dapat menyimpan beberapa pencarian.

Relasi tersebut diimplementasikan menggunakan foreign key pada migration dan relationship methods pada masing-masing Eloquent Model.

## 4. Referential Integrity

Foreign key digunakan untuk memastikan setiap data yang mengacu pada tabel lain memiliki referensi yang valid.

Hasil pemeriksaan database menunjukkan:

| Validation | Result |
|---|---:|
| Total Foreign Keys | 34 |
| Valid Foreign Keys | 34 |
| Orphan Records | 0 |
| Referential Integrity | PASS |

Tidak ditemukan orphan records pada seluruh 34 foreign key yang diperiksa.

### 4.1 ON DELETE Rules

Database menggunakan dua aturan utama untuk penghapusan data:

- **CASCADE**: Data pada tabel child ikut dihapus ketika data parent dihapus secara permanen.
- **SET NULL**: Foreign key pada tabel child menjadi NULL ketika data parent dihapus secara permanen.

Dari hasil pemeriksaan:

| Delete Rule | Total |
|---|---:|
| CASCADE | 25 |
| SET NULL | 9 |
| Total | 34 |

Seluruh foreign key juga menggunakan `ON UPDATE CASCADE` untuk menjaga konsistensi referensi ketika nilai Primary Key diperbarui.

## 5. Soft Deletes

Soft Deletes digunakan agar data tidak langsung dihapus secara permanen dari database.

Laravel mengimplementasikan fitur ini menggunakan kolom `deleted_at` dan trait `SoftDeletes` pada Eloquent Model.

Terdapat 8 tabel yang mendukung Soft Deletes:

1. `achievements`
2. `categories`
3. `competitions`
4. `organizers`
5. `preparation_resources`
6. `teams`
7. `universities`
8. `users`

Hasil validasi menunjukkan bahwa seluruh 8 tabel memiliki kolom `deleted_at` dengan tipe `timestamp` dan nullable, serta seluruh model terkait menggunakan trait `SoftDeletes`.

**Validation Result: 8/8 Models PASS.**

## 6. Database Indexing

Index digunakan untuk membantu meningkatkan efisiensi pencarian, filtering, sorting, dan pengambilan data.

Beberapa index penting yang telah diterapkan:

| Table | Indexed Columns | Purpose |
|---|---|---|
| `competitions` | `competition_name` | Mendukung pencarian kompetisi berdasarkan nama. |
| `competitions` | `status`, `registration_deadline` | Mendukung filtering status dan deadline. |
| `competitions` | `registration_fee`, `region` | Mendukung filtering berdasarkan biaya dan wilayah. |
| `competitions` | `category_id`, `competition_level`, `difficulty_level` | Mendukung filtering berdasarkan kategori dan tingkat kompetisi. |
| `competitions` | `competition_type` | Filtering tipe kompetisi. |
| `competitions` | `competition_mode` | Filtering mode kompetisi. |
| `bookmarks` | `user_id`, `competition_id` | Mencegah bookmark duplikat. |
| `registrations` | `competition_id`, `user_id` | Mencegah registrasi ganda untuk pasangan pengguna dan kompetisi. |
| `notifications` | `user_id`, `read_at`, `created_at` | Mendukung pengambilan notifikasi pengguna. |
| `recommendations` | `user_id`, `recommendation_score` | Mendukung pengambilan dan pengurutan rekomendasi. |
| `teams` | `competition_id`, `team_status` | Mendukung pencarian tim berdasarkan kompetisi dan status. |

Unique indexes juga diterapkan pada kolom tertentu untuk mencegah data duplikat, seperti email pengguna, nama kategori, dan kombinasi foreign key tertentu.

## 7. Database Migrations

Laravel Migrations digunakan untuk mengelola struktur database melalui file PHP sehingga perubahan struktur dapat dilacak dan dijalankan secara konsisten.

Migration yang dibuat mencakup:

- Pembuatan 19 tabel utama.
- Definisi kolom dan tipe data.
- Primary Key dan Foreign Key.
- Unique constraints.
- Database indexes.
- Soft Deletes.
- Additional indexes untuk tabel competitions.

Seluruh migration yang telah dibuat berhasil dijalankan tanpa pending migration.

### Migration Commands

Menjalankan migration:

```bash
php artisan migrate
```

Melihat status migration:

```bash
php artisan migrate:status
```

Membuat migration baru:

```bash
php artisan make:migration migration_name
```

## 8. Database Seeders and Factories

Database Seeders digunakan untuk mengisi database dengan data awal atau dummy data untuk kebutuhan pengembangan dan pengujian.

### 8.1 Seeded Data

| Table | Number of Records |
|---|---:|
| `categories` | 10 |
| `organizers` | 8 |
| `competitions` | 30 |

### 8.2 Seeders

- `CategorySeeder`: Mengisi data kategori kompetisi.
- `OrganizerSeeder`: Mengisi data penyelenggara kompetisi.
- `CompetitionSeeder`: Mengisi data dummy kompetisi dengan relasi kategori dan organizer yang valid.
- `DatabaseSeeder`: Menjalankan seluruh seeder berdasarkan urutan dependensi.

Factories digunakan untuk menghasilkan data dummy dengan nilai yang bervariasi.

### Seeder Commands

Menjalankan seluruh seeder:

```bash
php artisan db:seed
```

Menjalankan seeder tertentu:

```bash
php artisan db:seed --class=CategorySeeder
```

Menjalankan ulang migration sekaligus seeder (menghapus seluruh tabel dan membuat ulang struktur database):

```bash
php artisan migrate:fresh --seed
```

**Warning:** Gunakan `migrate:fresh --seed` hanya pada lingkungan development karena seluruh tabel akan dihapus dan dibuat ulang.

## 9. Eloquent Models

Setiap tabel utama memiliki Eloquent Model untuk merepresentasikan data dan mendefinisikan hubungan antartabel.

Relationship yang digunakan meliputi:

- `hasMany()`
- `belongsTo()`
- Relationship lainnya sesuai kebutuhan struktur data.

Eloquent Models membantu menjaga konsistensi relasi dan mempermudah pengelolaan data melalui Laravel ORM.

## 10. Database Validation

Beberapa pengujian telah dilakukan untuk memastikan database berjalan dengan baik.

| No. | Validation | Result |
|---|---|---|
| 1 | Database connection | PASS |
| 2 | Migration execution | PASS |
| 3 | Table structure | PASS |
| 4 | Eloquent relationships | PASS |
| 5 | Seeder execution | PASS |
| 6 | Foreign key validation | PASS |
| 7 | Orphan records validation | PASS |
| 8 | ON DELETE and ON UPDATE rules | PASS |
| 9 | Soft Deletes validation | PASS |
| 10 | Index inspection | PASS |

### Validation Summary

- 19 main database tables successfully created.
- 34 foreign keys successfully validated.
- 0 orphan records found.
- 8 Soft Deletes tables successfully matched with their Eloquent Models.
- Seeders successfully generated 48 initial records across categories, organizers, and competitions.
- Database indexes successfully inspected.

## 11. Local Development Setup

Pastikan project Laravel sudah terpasang dan MySQL melalui XAMPP sudah berjalan.

### Step 1. Configure Environment

Atur konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=SUKI
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username, password, dan port dengan konfigurasi MySQL lokal.

### Step 2. Install Dependencies

```bash
composer install
```

### Step 3. Generate Application Key

```bash
php artisan key:generate
```

### Step 4. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### Step 5. Verify Migration Status

```bash
php artisan migrate:status
```

Pastikan migration telah berhasil dijalankan dan tidak ada status Pending.

## 12. DBA Responsibilities

Lingkup pekerjaan Database Administrator (DBA) pada project SUKI meliputi:

1. Merancang struktur database berdasarkan kebutuhan sistem.
2. Menentukan tabel, atribut, tipe data, dan constraints.
3. Menentukan Primary Key dan Foreign Key.
4. Mengimplementasikan relasi dan referential integrity.
5. Mengelola database migrations.
6. Mengimplementasikan Eloquent Models dan relationships.
7. Mengelola database seeders dan factories.
8. Menerapkan indexes dan unique constraints.
9. Mengimplementasikan Soft Deletes pada tabel yang relevan.
10. Melakukan validasi struktur, relasi, dan integritas database.
11. Menyusun dokumentasi database untuk kebutuhan pengembangan dan pemeliharaan.

---

**Database Status: Successfully Implemented and Validated**

*Documentation for SUKI Database Development.*
# 🎉 Ekskul Management System (EMS) 🎉

Selamat datang di **Ekskul Management System (EMS)**, sebuah aplikasi berbasis Laravel yang dirancang khusus untuk membantu sekolah mengelola ekstrakurikuler dengan mudah dan menyenangkan. Jika Anda pernah merasa pusing karena harus mencatat data pembina, ekskul, dan kegiatan manual, maka EMS adalah jawaban dari doa-doa Anda (dan mungkin juga dari mimpi buruk Anda sebagai programmer).

---

## 🌟 Fitur Utama

1. **CRUD Ekskul**: Tambah, edit, hapus, dan lihat data ekskul dengan mudah. Pramuka? Futsal? Musik? Semua ada di sini!
2. **Manajemen Pembina**: Kelola data pembina ekskul lengkap dengan foto profil mereka (siapa tahu ada yang mau jadi selebgram).
3. **Relasi Data**: Pembina dan ekskul terhubung dengan rapi melalui foreign key. Seperti hubungan antara kopi dan programmer—tidak bisa dipisahkan.
4. **Upload Foto Profil**: Unggah foto profil pembina atau logo ekskul. Jangan lupa pakai filter Instagram supaya lebih kece!
5. **Responsive Design**: Bisa diakses dari laptop, tablet, atau HP. Karena kami tahu, kadang-kadang admin panel diakses sambil rebahan.

---

## 💡 Filosofi Programmer dalam Proyek Ini

1. **"Debugging is like being the detective in a crime movie where you are also the murderer."**
   - Debugging adalah bagian dari hidup seorang programmer. Ketika error `419 Page Expired` muncul, ingatlah bahwa Anda sendiri yang lupa menambahkan `@csrf`. It's okay, kita semua pernah di situ. 😅

2. **"First, solve the problem. Then, write the code."**
   - Sebelum mulai coding, kami duduk bersama secangkir kopi dan bertanya, "Apa sih masalah utama yang ingin dipecahkan?" Jawabannya: "Bagaimana cara membuat admin panel ekskul tanpa bikin kepala botak."

3. **"Code is like humor. When you have to explain it, it’s bad."**
   - Kami berusaha membuat kode sejelas mungkin. Jika Anda harus membaca dokumentasi hanya untuk memahami satu baris kode, berarti kami gagal. (Tapi tetap baca dokumentasi ya, biar ilmunya nambah!)

4. **"Programming is 10% writing code and 90% figuring out why it doesn’t work."**
   - Kami menghabiskan waktu berjam-jam hanya untuk memperbaiki error `SQLSTATE[42S02]`. Tapi setelah berhasil, rasanya seperti menemukan harta karun di pulau kecil.

5. **"Talk is cheap. Show me the code."**
   - Cukup omong kosong, mari kita lihat kode! (Spoiler alert: Laravel itu keren banget.)

---

## 🛠 Teknologi yang Digunakan

- **Framework**: [Laravel](https://laravel.com/) (karena life is too short to write vanilla PHP).
- **Database**: MySQL (tempat kita menyimpan semua rahasia ekskul).
- **Frontend**: Blade Templates + Bootstrap (simple, clean, dan responsive).
- **Storage**: Public Disk Storage (untuk menyimpan foto profil dan logo ekskul).
- **Authentication**: Session-based login (karena kami percaya privasi itu penting).

---

---

## 🚀 Cara Menggunakan Proyek Ini

### 1. Clone Repository
```bash
git clone https://github.com/Fema19/ekstrakurikuler.git
cd ekskul-management-system
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Buat file `.env` berdasarkan `.env.example`:
```bash
cp .env.example .env
```
Kemudian edit file `.env` sesuai dengan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Jalankan Migration
```bash
php artisan migrate
```

### 6. Seed Database
Untuk mengisi database dengan data awal (dummy data), jalankan perintah berikut:

#### a. Seed untuk Tabel User
```bash
php artisan db:seed --class=UserTableSeeder
```

#### b. Seed untuk Semua Tabel
Jika Anda memiliki seeder utama (`DatabaseSeeder`) yang mencakup semua tabel, jalankan:
```bash
php artisan db:seed --class=DatabaseSeeder
```

> **Catatan:** Pastikan Anda sudah membuat seeder untuk tabel-tabel yang relevan, seperti `UserTableSeeder` atau `DatabaseSeeder`. Jika belum, Anda bisa membuatnya menggunakan perintah:
> ```bash
> php artisan make:seeder UserTableSeeder
> ```

### 7. Buat Symbolic Link untuk Storage
Untuk mengakses file yang diunggah (misalnya foto profil atau logo ekskul) melalui browser, buat symbolic link dengan perintah:
```bash
php artisan storage:link
```

> **Penjelasan:** Perintah ini akan membuat folder `storage/app/public` dapat diakses melalui URL `/storage`. Misalnya, file yang disimpan di `storage/app/public/foto-profil` dapat diakses melalui `http://localhost:8000/storage/foto-profil`.

### 8. Jalankan Server
```bash
php artisan serve
```

Buka browser dan kunjungi `http://127.0.0.1:8000`. Selamat, Anda sekarang resmi menjadi admin ekskul!

---

## 📝 Tips untuk Admin

1. **Seed Data Awal**: Gunakan seeder untuk mengisi database dengan data dummy saat pertama kali menjalankan aplikasi. Ini memudahkan pengujian.
2. **Storage Link**: Jangan lupa jalankan `php artisan storage:link` jika Anda ingin mengunggah file seperti foto profil atau logo ekskul.
3. **Backup Seeder**: Simpan file seeder Anda dengan baik. Jika Anda perlu mengatur ulang database, Anda bisa menggunakan seeder untuk mengisi kembali data.

---
Buka browser dan kunjungi `http://127.0.0.1:8000`. Selamat, Anda sekarang resmi menjadi admin ekskul!

---

## 📝 Tips dari Admin

1. **Jangan Lupa Isi CSRF Token**: Jika Anda mendapatkan error `419 Page Expired`, cek apakah sudah menambahkan `@csrf` di form. Programmer juga manusia, kadang lupa.
2. **Backup Database Secara Berkala**: Kalau server down, setidaknya Anda masih punya backup. Ingat pepatah: "Better safe than sorry."
3. **Gunakan Validasi**: Pastikan data yang dimasukkan valid. Jangan sampai ada pembina ekskul bernama "12345" atau NIP "abcde".

---

## 🤔 Catatan Penting

- **Untuk Programmer**: Jangan takut untuk refactoring kode. Refactoring adalah proses belajar bahwa kode yang Anda tulis minggu lalu adalah sampah. 😂
- **Untuk Admin**: Jangan panik jika ada bug. Bug adalah bagian dari hidup. Hubungi programmer Anda dengan sopan dan katakan, "Ada sedikit masalah, bisa dibantu?"

---

## 🙏 Terima Kasih

Terima kasih telah menggunakan **Ekskul Management System**. Semoga aplikasi ini bisa membantu Anda mengelola ekskul dengan lebih efisien. Jika Anda menemukan bug atau memiliki ide fitur baru, silakan buat issue di repository ini.

Dan ingat, hidup ini seperti coding: **ada banyak cara untuk menyelesaikan masalah, tapi hanya beberapa yang benar-benar elegan.**

---


## 🙌 Contributor
Proyek ini dibuat untuk tujuan pendidikan dan etika. Kontribusi dan perbaikan akan diterima untuk membuatnya lebih aman dan bermanfaat. Anda dapat berkontribusi dengan membuat permintaan fork dan pull atau mengirimkan patch melalui issue.


<a href="https://github.com/Fema19/ekstrakurikuler/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Fema19/ekstrakurikuler"/>
</a>

## 🤖 Quotes Inspiratif untuk Programmer

1. "There are two ways to write error-free programs; only the third one works."
2. "Why do programmers prefer dark mode? Because light attracts bugs."
3. "I don't always test my code, but when I do, I do it in production." (Please don't do this.)
4. "A programmer is just a tool which converts caffeine into code."

---

## 📜 Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Artinya, Anda bebas menggunakan, memodifikasi, dan mendistribusikan kode ini sesuka hati. Tapi kalau Anda sukses jadi milyarder gara-gara ini, jangan lupa traktir kami kopi ya! ☕

---

Semoga README ini membantu Anda menjelaskan proyek Anda dengan gaya yang santai, lucu, dan tetap profesional. Jika ada yang ingin ditambahkan atau diubah, beri tahu saya! 😊

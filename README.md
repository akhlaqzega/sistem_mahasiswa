# Sistem Manajemen Mahasiswa

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.3.x-06B6D4?logo=tailwind-css&logoColor=white)

Sistem berbasis web untuk manajemen data mahasiswa dan permintaan perubahan data dengan otorisasi dua level (admin & mahasiswa).

## ✨ Fitur Utama

### **Role Admin**
- 📊 Dashboard dengan statistik real-time
- 👥 Manajemen data mahasiswa (CRUD lengkap)
- ✏️ Verifikasi permintaan perubahan data (approve/reject)
- 📝 Beri catatan pada setiap permintaan
- 🔍 Filter permintaan berdasarkan status

### **Role Mahasiswa**
- 👤 Lihat profil pribadi
- 📨 Ajukan permintaan perubahan data
- 🕵️ Lacak status permintaan
- 🔔 Notifikasi perubahan status

## 🛠 Teknologi
- **Backend**: Laravel 10
- **Frontend**: Tailwind CSS 3
- **Database**: MySQL
- **Autentikasi**: Laravel Sanctum
- **Pagination**: Laravel Eloquent
- **Middleware**: Otorisasi berbasis role

## 📦 Instalasi

1. Clone repositori:
   ```bash
   git clone https://github.com/username/sistem-mahasiswa.git
   cd sistem-mahasiswa

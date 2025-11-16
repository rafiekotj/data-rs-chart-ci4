# Chart Data RS

Sebuah web visualisasi data rumah sakit di Indonesia menggunakan grafik interaktif.

🔗 **Demo Website:** https://chartdatars.onrender.com

## 📊 Fitur Utama
- Filter data real-time tanpa tombol "Apply"
- Line chart, bar chart, dan tabel dinamis
- Filter provinsi, kabupaten/kota, kelas RS, jenis RS, penyelenggara
- Rentang tahun (tahun awal – tahun akhir) yang langsung memperbarui grafik
- Responsif dan ringan diakses

## 🏗️ Teknologi yang Digunakan
- **Frontend:** HTML, CSS, JavaScript
- **Chart:** Chart.js
- **Backend:** CodeIgniter 4
- **Database:** Supabase (RPC Functions)
- **Hosting:** Render

## 📦 Struktur Utama
```
/public
  /js
  /css
/app
  /Controllers
  /Models
  /Views
```

## ▶️ Cara Menjalankan di Local
1. Clone repository
   ```bash
   git clone https://github.com/username/chart-data-rs.git
   ```
2. Masuk folder project
   ```bash
   cd chart-data-rs
   ```
3. Jalankan server CI4
   ```bash
   php spark serve
   ```
4. Buka di browser
   ```
   http://localhost:8080
   ```

## ⚙️ Konfigurasi Supabase
Pastikan file `ModelDashboard.php` sudah diisi:
- URL Supabase
- API Key
- RPC function yang digunakan (get_all_rs, get_rs_filtered, dll.)

## 📌 Catatan
- Filter tahun bekerja otomatis tanpa tombol apply
- Rentang tahun 2025-2025 menampilkan 1 titik (fixed logic)
- Tabel bisa diurutkan per provinsi dan kabupaten/kota

## 👨‍💻 Pengembang
Project ini dibuat untuk kebutuhan dashboard data rumah sakit Indonesia.
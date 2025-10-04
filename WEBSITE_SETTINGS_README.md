# Website Settings - Panel Kontrol Website

## Deskripsi
Website Settings adalah panel kontrol khusus untuk mengatur semua aspek branding dan konten website secara dinamis. Dengan fitur ini, admin dapat mengubah nama website, judul halaman, header, footer, dan elemen lainnya tanpa perlu edit kode.

## Fitur Utama

### 🎨 **Brand Identity**
- **Nama Website**: Nama utama yang muncul di navbar, title, dan footer
- **Tagline Website**: Slogan yang muncul di halaman utama
- **Deskripsi Website**: Deskripsi singkat tentang website/perusahaan

### 📄 **Judul Halaman (Browser Tab)**
- **Judul Halaman Beranda**: Title di tab browser untuk halaman beranda
- **Judul Halaman Portofolio**: Title di tab browser untuk halaman portofolio
- **Judul Halaman About**: Title di tab browser untuk halaman tentang
- **Judul Halaman Kontak**: Title di tab browser untuk halaman kontak

### 📝 **Header Halaman**
- **Header Halaman Beranda**: Judul besar di halaman beranda
- **Header Halaman Portofolio**: Judul besar di halaman portofolio
- **Subtitle Portofolio**: Subtitle yang muncul di bawah header portofolio
- **Header Halaman About**: Judul besar di halaman tentang
- **Header Halaman Kontak**: Judul besar di halaman kontak
- **Subtitle Kontak**: Subtitle yang muncul di bawah header kontak

### ⚙️ **Footer & Lainnya**
- **Copyright Footer**: Teks copyright di footer
- **Teks Loading Screen**: Teks yang muncul di loading screen
- **Judul Admin Dashboard**: Title halaman admin dashboard
- **Brand Admin Sidebar**: Nama brand di sidebar admin

## Cara Menggunakan

### 1. Akses Website Settings
1. Login ke dashboard admin
2. Klik menu **"Website Settings"** di sidebar
3. Anda akan melihat form dengan 4 section utama

### 2. Edit Pengaturan Website

#### **Brand Identity**
- **Nama Website**: Akan muncul di navbar, title browser, dan footer
- **Tagline**: Slogan di halaman utama (opsional)
- **Deskripsi**: Deskripsi singkat perusahaan (opsional)

#### **Judul Halaman**
- Mengatur title yang muncul di tab browser
- Format: "[Judul Halaman] - [Nama Website]"
- Contoh: "Beranda - LittleStar Studio"

#### **Header Halaman**
- Mengatur judul besar yang muncul di setiap halaman
- Subtitle untuk memberikan deskripsi tambahan

#### **Footer & Lainnya**
- Copyright footer, loading screen, dan admin dashboard

### 3. Menyimpan Perubahan
- Klik tombol **"Simpan Semua Pengaturan"**
- Perubahan akan langsung terlihat di seluruh website
- Preview website untuk memastikan perubahan sudah benar

## Field yang Wajib Diisi

### ✅ **Wajib**
- Nama Website
- Judul Halaman Beranda
- Judul Halaman Portofolio
- Judul Halaman About
- Judul Halaman Kontak
- Header Halaman Beranda
- Header Halaman Portofolio
- Header Halaman About
- Header Halaman Kontak
- Copyright Footer
- Teks Loading Screen
- Judul Admin Dashboard
- Brand Admin Sidebar

### 📝 **Opsional**
- Tagline Website
- Deskripsi Website
- Subtitle Portofolio
- Subtitle Kontak

## Dampak Perubahan

### 🌐 **Halaman yang Terpengaruh**

#### **Nama Website**
- Navbar brand
- Title semua halaman
- Footer copyright (jika tidak diubah manual)

#### **Judul Halaman**
- Tab browser untuk setiap halaman
- SEO title

#### **Header Halaman**
- Judul besar di setiap halaman
- Hero section

#### **Footer & Loading**
- Footer di semua halaman
- Loading screen saat navigasi

#### **Admin Dashboard**
- Title halaman admin
- Brand di sidebar admin

## Contoh Penggunaan

### Sebelum (Hard-coded)
```
Navbar: "LittleStar Studio"
Title: "Beranda - LittleStar Studio"
Header: "LittleStar Studio"
Footer: "© 2024 LittleStar Studio. All rights reserved."
```

### Setelah (Dinamis)
```
Nama Website: "Creative Hub Studio"
Judul Beranda: "Home"
Header Beranda: "Welcome to Creative Hub"
Footer: "Creative Hub Studio. All rights reserved."

Hasil:
Navbar: "Creative Hub Studio"
Title: "Home - Creative Hub Studio"
Header: "Welcome to Creative Hub"
Footer: "© 2024 Creative Hub Studio. All rights reserved."
```

## Tips Penggunaan

### 📝 **Best Practices**
1. **Konsistensi**: Gunakan nama yang konsisten di semua field
2. **SEO Friendly**: Buat judul halaman yang deskriptif
3. **Branding**: Pastikan header mencerminkan brand identity
4. **Testing**: Selalu preview website setelah perubahan

### 🔍 **SEO Tips**
- Judul halaman sebaiknya 50-60 karakter
- Gunakan kata kunci yang relevan
- Buat judul yang unik untuk setiap halaman

### 🎨 **Design Tips**
- Header sebaiknya singkat dan impactful
- Subtitle memberikan konteks tambahan
- Tagline harus memorable dan mudah diingat

## Troubleshooting

### ❌ **Perubahan tidak terlihat**
- Refresh halaman (Ctrl+F5)
- Clear cache browser
- Pastikan data sudah tersimpan (ada notifikasi sukses)

### 🔄 **Ingin kembali ke default**
- Edit field dengan nilai default
- Atau jalankan seeder ulang: `php artisan db:seed --class=WebsiteSettingsSeeder`

### 📱 **Responsive Issues**
- Test di berbagai device
- Pastikan teks tidak terlalu panjang untuk mobile

## Keunggulan Fitur

### ✅ **Fleksibilitas**
- Tidak perlu edit kode untuk mengubah branding
- Perubahan real-time di seluruh website
- Interface yang user-friendly

### ✅ **Maintenance**
- Mudah rebrand website
- Tidak perlu developer untuk perubahan teks
- Backup dan restore mudah

### ✅ **SEO**
- Title halaman dinamis
- Konsistensi branding
- Meta information yang tepat

---

**💡 Tips**: Gunakan fitur ini untuk rebrand website, seasonal campaign, atau penyesuaian branding tanpa perlu mengubah kode!
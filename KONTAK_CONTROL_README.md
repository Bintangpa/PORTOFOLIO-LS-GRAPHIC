# Kontak Control - Dokumentasi

## Deskripsi
Fitur Kontak Control memungkinkan admin untuk mengelola semua informasi kontak, sosial media, lokasi, dan jam operasional melalui dashboard admin. Perubahan akan langsung terlihat di halaman kontak publik.

## Fitur Utama

### 1. Manajemen Pengaturan Kontak
- **Informasi Umum**: Nama perusahaan, tagline, email, telepon, WhatsApp
- **Lokasi & Alamat**: Alamat lengkap, kota, provinsi, kode pos, Google Maps
- **Jam Operasional**: Pengaturan jam untuk setiap hari dalam seminggu
- **Media Sosial**: Link ke Facebook, Instagram, Twitter, LinkedIn, YouTube, TikTok

### 2. Operasi CRUD
- **Create**: Tambah pengaturan baru secara dinamis
- **Read**: Lihat semua pengaturan yang terorganisir per grup
- **Update**: Edit nilai pengaturan dengan mudah
- **Delete**: Hapus pengaturan yang tidak diperlukan

### 3. Kontrol Status
- **Toggle Active/Inactive**: Aktifkan atau nonaktifkan pengaturan tanpa menghapus
- **Real-time Update**: Perubahan langsung tersimpan via AJAX

## Cara Menggunakan

### Mengakses Kontak Control
1. Login ke dashboard admin
2. Klik menu "Kontak Control" di sidebar
3. Anda akan melihat 4 grup pengaturan:
   - **Informasi Umum**: Data dasar perusahaan
   - **Media Sosial**: Link platform sosial media
   - **Lokasi & Alamat**: Informasi alamat lengkap
   - **Jam Operasional**: Jadwal operasional harian

### Mengedit Pengaturan
1. Temukan pengaturan yang ingin diubah
2. Edit nilai di field input/textarea
3. Klik tombol "Simpan Semua Perubahan" di bawah

### Menambah Pengaturan Baru
1. Klik tombol "Tambah Pengaturan" di header
2. Isi form dengan data:
   - **Key**: Identifier unik (contoh: `new_contact_info`)
   - **Label**: Nama yang ditampilkan
   - **Tipe**: Jenis input (text, textarea, email, phone, url, time)
   - **Grup**: Kategori pengaturan
   - **Nilai**: Nilai default (opsional)
   - **Deskripsi**: Penjelasan pengaturan (opsional)
3. Klik "Simpan Pengaturan"

### Mengaktifkan/Nonaktifkan Pengaturan
1. Gunakan toggle switch di sebelah kanan setiap pengaturan
2. Pengaturan nonaktif akan di-disable dan tidak muncul di website publik

### Menghapus Pengaturan
1. Hover pada pengaturan yang ingin dihapus
2. Klik tombol trash (🗑️) yang muncul di pojok kanan atas
3. Konfirmasi penghapusan

## Penggunaan di Template

### Helper Functions
```php
// Mendapatkan nilai pengaturan
{{ contact_setting('contact_email', 'default@email.com') }}

// Mendapatkan pengaturan per grup
@foreach(contact_settings_group('social') as $setting)
    {{ $setting->label }}: {{ $setting->value }}
@endforeach

// Mendapatkan semua pengaturan
@php $allSettings = all_contact_settings(); @endphp
```

### Contoh Penggunaan di View
```blade
<!-- Email kontak -->
<a href="mailto:{{ contact_setting('contact_email') }}">
    {{ contact_setting('contact_email') }}
</a>

<!-- WhatsApp link -->
<a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', contact_setting('contact_whatsapp')) }}">
    Chat WhatsApp
</a>

<!-- Alamat lengkap -->
<address>
    {{ contact_setting('address_street') }}<br>
    {{ contact_setting('address_city') }}, {{ contact_setting('address_postal_code') }}<br>
    {{ contact_setting('address_province') }}
</address>

<!-- Jam operasional -->
<div>
    Senin: {{ contact_setting('hours_monday') }}<br>
    Selasa: {{ contact_setting('hours_tuesday') }}<br>
    <!-- dst... -->
</div>

<!-- Social media links -->
@if(contact_setting('social_instagram'))
    <a href="{{ contact_setting('social_instagram') }}" target="_blank">
        <i class="fab fa-instagram"></i>
    </a>
@endif
```

## Struktur Database

### Tabel: contact_settings
- `id`: Primary key
- `key`: Identifier unik pengaturan
- `value`: Nilai pengaturan
- `type`: Tipe input (text, textarea, email, phone, url, time)
- `group`: Grup kategori (general, social, location, hours)
- `label`: Label yang ditampilkan
- `description`: Deskripsi pengaturan
- `sort_order`: Urutan tampilan
- `is_active`: Status aktif/nonaktif
- `created_at`, `updated_at`: Timestamp

## File yang Terlibat

### Backend
- `app/Models/ContactSetting.php` - Model utama
- `app/Http/Controllers/Admin/ContactController.php` - Controller admin
- `database/migrations/2024_01_27_000001_create_contact_settings_table.php` - Migration
- `database/seeders/ContactSettingsSeeder.php` - Data default
- `app/helpers.php` - Helper functions
- `app/Providers/ContactSettingsServiceProvider.php` - Service provider

### Frontend
- `resources/views/admin/contact/index.blade.php` - Interface admin
- `resources/views/contact.blade.php` - Halaman kontak publik (updated)
- `resources/views/layouts/admin.blade.php` - Layout admin (menu added)

### Routes
- `routes/web.php` - Route definitions

## Tips Penggunaan

1. **Backup Data**: Selalu backup database sebelum menghapus pengaturan penting
2. **Konsistensi Key**: Gunakan naming convention yang konsisten untuk key (snake_case)
3. **Validasi URL**: Pastikan URL media sosial valid dan lengkap dengan https://
4. **Format Telepon**: Gunakan format internasional untuk nomor telepon (+62...)
5. **Testing**: Test perubahan di halaman kontak publik setelah update

## Troubleshooting

### Pengaturan tidak muncul di website
- Pastikan pengaturan dalam status aktif (toggle ON)
- Cek apakah helper function dipanggil dengan key yang benar
- Refresh cache jika menggunakan caching

### Error saat menyimpan
- Pastikan key unik saat menambah pengaturan baru
- Validasi format email dan URL
- Cek permission database

### Halaman admin tidak bisa diakses
- Pastikan user memiliki role admin
- Cek middleware admin di routes
- Pastikan migration sudah dijalankan

## Pengembangan Lanjutan

Fitur ini dapat dikembangkan lebih lanjut dengan:
- Import/export pengaturan
- Backup/restore otomatis
- Validasi real-time
- Preview perubahan
- History perubahan
- Multi-language support
- API endpoint untuk mobile app
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class NavbarSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navbarSettings = [
            [
                'key' => 'navbar_title',
                'value' => 'LittleStar Studio',
                'type' => 'text',
                'label' => 'Judul Navbar',
                'description' => 'Teks yang akan muncul di navbar sebagai nama brand/website',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_logo',
                'value' => 'images/logo-ls-biru.png',
                'type' => 'text',
                'label' => 'Logo Navbar',
                'description' => 'Path ke file logo yang akan ditampilkan di navbar',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_logo_height',
                'value' => '85',
                'type' => 'number',
                'label' => 'Tinggi Logo (px)',
                'description' => 'Tinggi logo dalam pixel',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_logo_width',
                'value' => 'auto',
                'type' => 'text',
                'label' => 'Lebar Logo',
                'description' => 'Lebar logo (auto, 100px, dll)',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_show_title',
                'value' => '1',
                'type' => 'boolean',
                'label' => 'Tampilkan Judul',
                'description' => 'Apakah judul ditampilkan di navbar',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_show_logo',
                'value' => '1',
                'type' => 'boolean',
                'label' => 'Tampilkan Logo',
                'description' => 'Apakah logo ditampilkan di navbar',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_menu_home',
                'value' => 'Beranda',
                'type' => 'text',
                'label' => 'Nama Menu Beranda',
                'description' => 'Nama yang ditampilkan untuk menu beranda',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_menu_portfolio',
                'value' => 'Portofolio',
                'type' => 'text',
                'label' => 'Nama Menu Portofolio',
                'description' => 'Nama yang ditampilkan untuk menu portofolio',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_menu_about',
                'value' => 'Tentang',
                'type' => 'text',
                'label' => 'Nama Menu Tentang',
                'description' => 'Nama yang ditampilkan untuk menu tentang',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_menu_contact',
                'value' => 'Kontak',
                'type' => 'text',
                'label' => 'Nama Menu Kontak',
                'description' => 'Nama yang ditampilkan untuk menu kontak',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_menu_dashboard',
                'value' => 'Dashboard',
                'type' => 'text',
                'label' => 'Nama Menu Dashboard',
                'description' => 'Nama yang ditampilkan untuk menu dashboard admin',
                'is_active' => true,
            ],
            [
                'key' => 'navbar_search_placeholder',
                'value' => 'Cari portofolio...',
                'type' => 'text',
                'label' => 'Placeholder Pencarian',
                'description' => 'Teks placeholder untuk kolom pencarian',
                'is_active' => true,
            ],
        ];

        foreach ($navbarSettings as $setting) {
            WebsiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
        
        // Create welcome notification for admin
        $adminUser = \App\Models\User::where('role', 'admin')->first();
        if ($adminUser) {
            \App\Models\AdminNotification::create_notification(
                $adminUser->id,
                'Selamat Datang di Admin Dashboard',
                'Sistem notifikasi telah aktif. Anda akan menerima notifikasi untuk setiap perubahan yang dilakukan di control panel.',
                'system',
                'fas fa-bell',
                'system',
                null,
                'System'
            );
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class WebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Brand Identity
            [
                'key' => 'site_name',
                'value' => 'LittleStar Studio',
                'type' => 'text',
                'label' => 'Nama Website',
                'description' => 'Nama utama website yang akan muncul di navbar, title, dan footer'
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Creative Digital Solutions',
                'type' => 'text',
                'label' => 'Tagline Website',
                'description' => 'Slogan atau tagline yang muncul di halaman utama'
            ],
            [
                'key' => 'site_description',
                'value' => 'Studio kreatif yang menghadirkan solusi digital inovatif untuk kebutuhan bisnis Anda',
                'type' => 'textarea',
                'label' => 'Deskripsi Website',
                'description' => 'Deskripsi singkat tentang website/perusahaan'
            ],

            // Page Titles
            [
                'key' => 'home_title',
                'value' => 'Beranda',
                'type' => 'text',
                'label' => 'Judul Halaman Beranda',
                'description' => 'Title yang muncul di tab browser untuk halaman beranda'
            ],
            [
                'key' => 'portfolio_title',
                'value' => 'Portfolio',
                'type' => 'text',
                'label' => 'Judul Halaman Portfolio',
                'description' => 'Title yang muncul di tab browser untuk halaman portfolio'
            ],
            [
                'key' => 'about_title',
                'value' => 'Tentang Kami',
                'type' => 'text',
                'label' => 'Judul Halaman About',
                'description' => 'Title yang muncul di tab browser untuk halaman tentang'
            ],
            [
                'key' => 'contact_title',
                'value' => 'Kontak Kami',
                'type' => 'text',
                'label' => 'Judul Halaman Kontak',
                'description' => 'Title yang muncul di tab browser untuk halaman kontak'
            ],

            // Page Headers
            [
                'key' => 'home_header',
                'value' => 'LittleStar Studio',
                'type' => 'text',
                'label' => 'Header Halaman Beranda',
                'description' => 'Judul besar yang muncul di halaman beranda'
            ],
            [
                'key' => 'portfolio_header',
                'value' => 'Portfolio Kami',
                'type' => 'text',
                'label' => 'Header Halaman Portfolio',
                'description' => 'Judul besar yang muncul di halaman portfolio'
            ],
            [
                'key' => 'portfolio_subtitle',
                'value' => 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio',
                'type' => 'text',
                'label' => 'Subtitle Portfolio',
                'description' => 'Subtitle yang muncul di bawah header portfolio'
            ],
            [
                'key' => 'about_header',
                'value' => 'Tentang LittleStar Studio',
                'type' => 'text',
                'label' => 'Header Halaman About',
                'description' => 'Judul besar yang muncul di halaman tentang'
            ],
            [
                'key' => 'contact_header',
                'value' => 'Hubungi Kami',
                'type' => 'text',
                'label' => 'Header Halaman Kontak',
                'description' => 'Judul besar yang muncul di halaman kontak'
            ],
            [
                'key' => 'contact_subtitle',
                'value' => 'Siap membantu mewujudkan ide kreatif Anda. Mari berkolaborasi!',
                'type' => 'text',
                'label' => 'Subtitle Kontak',
                'description' => 'Subtitle yang muncul di bawah header kontak'
            ],

            // Footer
            [
                'key' => 'footer_copyright',
                'value' => 'LittleStar Studio. All rights reserved.',
                'type' => 'text',
                'label' => 'Copyright Footer',
                'description' => 'Teks copyright yang muncul di footer'
            ],

            // Loading Screen
            [
                'key' => 'loading_text',
                'value' => 'LITTLESTAR STUDIO',
                'type' => 'text',
                'label' => 'Teks Loading Screen',
                'description' => 'Teks yang muncul di loading screen'
            ],

            // Admin Dashboard
            [
                'key' => 'admin_title',
                'value' => 'Admin Dashboard',
                'type' => 'text',
                'label' => 'Judul Admin Dashboard',
                'description' => 'Title yang muncul di halaman admin'
            ],
            [
                'key' => 'admin_brand',
                'value' => 'LITTLESTAR',
                'type' => 'text',
                'label' => 'Brand Admin Sidebar',
                'description' => 'Nama brand yang muncul di sidebar admin'
            ]
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
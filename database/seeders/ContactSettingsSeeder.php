<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactSetting;

class ContactSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Contact Info
            [
                'key' => 'company_name',
                'value' => 'LittleStar Studio',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Nama Perusahaan',
                'description' => 'Nama perusahaan atau studio',
                'sort_order' => 1
            ],
            [
                'key' => 'company_tagline',
                'value' => 'Creative Digital Solutions',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Tagline',
                'description' => 'Tagline atau slogan perusahaan',
                'sort_order' => 2
            ],
            [
                'key' => 'contact_email',
                'value' => 'hello@littlestar.studio',
                'type' => 'email',
                'group' => 'general',
                'label' => 'Email Kontak',
                'description' => 'Email utama untuk kontak',
                'sort_order' => 3
            ],
            [
                'key' => 'contact_phone',
                'value' => '+62 812-3456-7890',
                'type' => 'phone',
                'group' => 'general',
                'label' => 'Nomor Telepon',
                'description' => 'Nomor telepon utama',
                'sort_order' => 4
            ],
            [
                'key' => 'contact_whatsapp',
                'value' => '+62 812-3456-7890',
                'type' => 'phone',
                'group' => 'general',
                'label' => 'WhatsApp',
                'description' => 'Nomor WhatsApp untuk kontak cepat',
                'sort_order' => 5
            ],

            // Location Info
            [
                'key' => 'address_street',
                'value' => 'Jl. Kreatif No. 123',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Alamat Jalan',
                'description' => 'Alamat jalan lengkap',
                'sort_order' => 1
            ],
            [
                'key' => 'address_city',
                'value' => 'Jakarta Selatan',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Kota',
                'description' => 'Nama kota',
                'sort_order' => 2
            ],
            [
                'key' => 'address_province',
                'value' => 'DKI Jakarta',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Provinsi',
                'description' => 'Nama provinsi',
                'sort_order' => 3
            ],
            [
                'key' => 'address_postal_code',
                'value' => '12345',
                'type' => 'text',
                'group' => 'location',
                'label' => 'Kode Pos',
                'description' => 'Kode pos wilayah',
                'sort_order' => 4
            ],
            [
                'key' => 'maps_embed_url',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sMonas!5e0!3m2!1sen!2sid!4v1234567890',
                'type' => 'url',
                'group' => 'location',
                'label' => 'Google Maps Embed URL',
                'description' => 'URL embed Google Maps untuk lokasi',
                'sort_order' => 5
            ],

            // Operating Hours
            [
                'key' => 'hours_monday',
                'value' => '09:00 - 18:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Senin',
                'description' => 'Jam operasional hari Senin',
                'sort_order' => 1
            ],
            [
                'key' => 'hours_tuesday',
                'value' => '09:00 - 18:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Selasa',
                'description' => 'Jam operasional hari Selasa',
                'sort_order' => 2
            ],
            [
                'key' => 'hours_wednesday',
                'value' => '09:00 - 18:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Rabu',
                'description' => 'Jam operasional hari Rabu',
                'sort_order' => 3
            ],
            [
                'key' => 'hours_thursday',
                'value' => '09:00 - 18:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Kamis',
                'description' => 'Jam operasional hari Kamis',
                'sort_order' => 4
            ],
            [
                'key' => 'hours_friday',
                'value' => '09:00 - 18:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Jumat',
                'description' => 'Jam operasional hari Jumat',
                'sort_order' => 5
            ],
            [
                'key' => 'hours_saturday',
                'value' => '09:00 - 15:00',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Sabtu',
                'description' => 'Jam operasional hari Sabtu',
                'sort_order' => 6
            ],
            [
                'key' => 'hours_sunday',
                'value' => 'Tutup',
                'type' => 'text',
                'group' => 'hours',
                'label' => 'Minggu',
                'description' => 'Jam operasional hari Minggu',
                'sort_order' => 7
            ],

            // Social Media
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook',
                'description' => 'URL halaman Facebook',
                'sort_order' => 1
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram',
                'description' => 'URL halaman Instagram',
                'sort_order' => 2
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Twitter',
                'description' => 'URL halaman Twitter',
                'sort_order' => 3
            ],
            [
                'key' => 'social_linkedin',
                'value' => 'https://linkedin.com/company/littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'LinkedIn',
                'description' => 'URL halaman LinkedIn',
                'sort_order' => 4
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'YouTube',
                'description' => 'URL channel YouTube',
                'sort_order' => 5
            ],
            [
                'key' => 'social_tiktok',
                'value' => 'https://tiktok.com/@littlestarstudio',
                'type' => 'url',
                'group' => 'social',
                'label' => 'TikTok',
                'description' => 'URL halaman TikTok',
                'sort_order' => 6
            ]
        ];

        foreach ($settings as $setting) {
            ContactSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
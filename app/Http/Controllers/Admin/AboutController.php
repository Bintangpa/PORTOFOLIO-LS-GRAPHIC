<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Traits\CreatesNotifications;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use CreatesNotifications;
    public function index()
    {
        $settings = [
            // Hero Section
            'about_hero_title' => $this->getSetting('about_hero_title', 'Tentang LittleStar Studio'),
            'about_hero_description' => $this->getSetting('about_hero_description', 'Kami adalah studio kreatif yang berdedikasi untuk menciptakan karya-karya digital yang menginspirasi dan memberikan dampak positif bagi klien dan masyarakat.'),
            
            // Vision & Mission
            'about_vision_title' => $this->getSetting('about_vision_title', 'Visi Kami'),
            'about_vision_content' => $this->getSetting('about_vision_content', 'Menjadi studio kreatif terdepan yang menghadirkan solusi digital inovatif dan berkualitas tinggi, serta memberikan pengalaman luar biasa bagi setiap klien yang bekerja sama dengan kami.'),
            'about_mission_title' => $this->getSetting('about_mission_title', 'Misi Kami'),
            'about_mission_content' => $this->getSetting('about_mission_content', 'Menciptakan karya-karya digital yang tidak hanya indah secara visual, tetapi juga fungsional dan memberikan nilai tambah bagi bisnis klien melalui pendekatan yang kreatif dan profesional.'),
            
            // Values
            'about_values_title' => $this->getSetting('about_values_title', 'Nilai-Nilai Kami'),
            'about_value1_title' => $this->getSetting('about_value1_title', 'Kreativitas'),
            'about_value1_content' => $this->getSetting('about_value1_content', 'Kami selalu mencari solusi kreatif dan inovatif untuk setiap tantangan yang dihadapi.'),
            'about_value2_title' => $this->getSetting('about_value2_title', 'Kualitas'),
            'about_value2_content' => $this->getSetting('about_value2_content', 'Setiap karya yang kami hasilkan selalu mengutamakan kualitas dan detail yang sempurna.'),
            'about_value3_title' => $this->getSetting('about_value3_title', 'Kolaborasi'),
            'about_value3_content' => $this->getSetting('about_value3_content', 'Kami percaya bahwa hasil terbaik lahir dari kolaborasi yang solid dengan klien.'),
            
            // Services
            'about_services_title' => $this->getSetting('about_services_title', 'Layanan Kami'),
            'about_service1_title' => $this->getSetting('about_service1_title', 'Web Development'),
            'about_service1_content' => $this->getSetting('about_service1_content', 'Pengembangan website responsif dan modern dengan teknologi terkini.'),
            'about_service2_title' => $this->getSetting('about_service2_title', 'Mobile App'),
            'about_service2_content' => $this->getSetting('about_service2_content', 'Aplikasi mobile yang user-friendly untuk iOS dan Android.'),
            'about_service3_title' => $this->getSetting('about_service3_title', 'UI/UX Design'),
            'about_service3_content' => $this->getSetting('about_service3_content', 'Desain antarmuka yang menarik dan pengalaman pengguna yang optimal.'),
            'about_service4_title' => $this->getSetting('about_service4_title', 'Digital Marketing'),
            'about_service4_content' => $this->getSetting('about_service4_content', 'Strategi pemasaran digital untuk meningkatkan visibilitas online.'),
            
            // CTA Section
            'about_cta_title' => $this->getSetting('about_cta_title', 'Siap Berkolaborasi dengan Kami?'),
            'about_cta_description' => $this->getSetting('about_cta_description', 'Mari wujudkan ide kreatif Anda bersama LittleStar Studio. Hubungi kami untuk konsultasi gratis!'),
            'about_cta_button_text' => $this->getSetting('about_cta_button_text', 'Mulai Proyek Anda'),
        ];

        return view('admin.about.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        // Define labels for each setting key
        $labels = [
            'about_hero_title' => 'Judul Hero Tentang',
            'about_hero_description' => 'Deskripsi Hero Tentang',
            'about_vision_title' => 'Judul Visi',
            'about_vision_content' => 'Konten Visi',
            'about_mission_title' => 'Judul Misi',
            'about_mission_content' => 'Konten Misi',
            'about_values_title' => 'Judul Nilai-Nilai',
            'about_value1_title' => 'Judul Nilai 1',
            'about_value1_content' => 'Konten Nilai 1',
            'about_value2_title' => 'Judul Nilai 2',
            'about_value2_content' => 'Konten Nilai 2',
            'about_value3_title' => 'Judul Nilai 3',
            'about_value3_content' => 'Konten Nilai 3',
            'about_services_title' => 'Judul Layanan',
            'about_service1_title' => 'Judul Layanan 1',
            'about_service1_content' => 'Konten Layanan 1',
            'about_service2_title' => 'Judul Layanan 2',
            'about_service2_content' => 'Konten Layanan 2',
            'about_service3_title' => 'Judul Layanan 3',
            'about_service3_content' => 'Konten Layanan 3',
            'about_service4_title' => 'Judul Layanan 4',
            'about_service4_content' => 'Konten Layanan 4',
            'about_cta_title' => 'Judul CTA',
            'about_cta_description' => 'Deskripsi CTA',
            'about_cta_button_text' => 'Teks Tombol CTA',
        ];

        foreach ($request->settings as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'label' => $labels[$key] ?? ucfirst(str_replace('_', ' ', $key)),
                    'type' => 'text',
                    'description' => 'Pengaturan untuk halaman tentang',
                    'is_active' => true
                ]
            );
        }

        // Create notification
        $this->createAboutNotification();

        return redirect()->route('admin.about.index')
            ->with('success', 'Pengaturan halaman tentang berhasil diperbarui!');
    }

    private function getSetting($key, $default = '')
    {
        return WebsiteSetting::where('key', $key)->value('value') ?? $default;
    }
}
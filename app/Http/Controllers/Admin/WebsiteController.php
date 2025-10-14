<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Traits\CreatesNotifications;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    use CreatesNotifications;
    /**
     * Display the website settings management page
     */
    public function index()
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengakses pengaturan website.');
        }
        // Get current website settings with default values
        $settings = [
            // Brand Identity
            'site_name' => $this->getSetting('site_name', 'LittleStar Studio'),
            'site_tagline' => $this->getSetting('site_tagline', 'Creative Digital Solutions'),
            'site_description' => $this->getSetting('site_description', 'Studio kreatif yang menghadirkan solusi digital inovatif untuk kebutuhan bisnis Anda'),
            
            // Page Titles
            'home_title' => $this->getSetting('home_title', 'Beranda'),
            'portfolio_title' => $this->getSetting('portfolio_title', 'Portofolio'),
            'about_title' => $this->getSetting('about_title', 'Tentang Kami'),
            'contact_title' => $this->getSetting('contact_title', 'Kontak Kami'),
            
            // Page Headers
            'home_header' => $this->getSetting('home_header', 'LittleStar Studio'),
            'portfolio_header' => $this->getSetting('portfolio_header', 'Portofolio Kami'),
            'portfolio_subtitle' => $this->getSetting('portfolio_subtitle', 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio'),
            'about_header' => $this->getSetting('about_header', 'Tentang LittleStar Studio'),
            'contact_header' => $this->getSetting('contact_header', 'Hubungi Kami'),
            'contact_subtitle' => $this->getSetting('contact_subtitle', 'Siap membantu mewujudkan ide kreatif Anda. Mari berkolaborasi!'),
            
            // Contact Information
            'contact_whatsapp' => $this->getSetting('contact_whatsapp', '62123456789'),
            'contact_instagram' => $this->getSetting('contact_instagram', 'littlestarstudio'),
            'contact_email' => $this->getSetting('contact_email', 'info@littlestarstudio.com'),
            
            // Footer & Others
            'footer_copyright' => $this->getSetting('footer_copyright', 'LittleStar Studio. All rights reserved.'),
            'loading_text' => $this->getSetting('loading_text', 'LITTLESTAR STUDIO'),
            'admin_title' => $this->getSetting('admin_title', 'Admin Dashboard'),
            'admin_brand' => $this->getSetting('admin_brand', 'LITTLESTAR'),
        ];
        
        return view('admin.website.index', compact('settings'));
    }

    /**
     * Update website settings
     */
    public function update(Request $request)
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengubah pengaturan website.');
        }
        
        // Log admin activity
        \Log::info('Admin mengubah pengaturan website', [
            'admin_id' => auth()->id(),
            'admin_name' => auth()->user()->name,
            'timestamp' => now()
        ]);
        $request->validate([
            'settings' => 'required|array',
            'settings.site_name' => 'required|string|max:255',
            'settings.home_title' => 'required|string|max:255',
            'settings.portfolio_title' => 'required|string|max:255',
            'settings.about_title' => 'required|string|max:255',
            'settings.contact_title' => 'required|string|max:255',
            'settings.home_header' => 'required|string|max:255',
            'settings.portfolio_header' => 'required|string|max:255',
            'settings.about_header' => 'required|string|max:255',
            'settings.contact_header' => 'required|string|max:255',
            'settings.footer_copyright' => 'required|string|max:255',
            'settings.loading_text' => 'required|string|max:255',
            'settings.admin_title' => 'required|string|max:255',
            'settings.admin_brand' => 'required|string|max:255',
            'settings.contact_whatsapp' => 'required|string|max:20',
            'settings.contact_instagram' => 'required|string|max:100',
            'settings.contact_email' => 'required|email|max:255',
            'settings.site_tagline' => 'nullable|string|max:255',
            'settings.site_description' => 'nullable|string|max:1000',
            'settings.portfolio_subtitle' => 'nullable|string|max:500',
            'settings.contact_subtitle' => 'nullable|string|max:500',
        ], [
            'settings.site_name.required' => 'Nama website wajib diisi',
            'settings.home_title.required' => 'Judul halaman beranda wajib diisi',
            'settings.portfolio_title.required' => 'Judul halaman portfolio wajib diisi',
            'settings.about_title.required' => 'Judul halaman about wajib diisi',
            'settings.contact_title.required' => 'Judul halaman kontak wajib diisi',
            'settings.home_header.required' => 'Header halaman beranda wajib diisi',
            'settings.portfolio_header.required' => 'Header halaman portfolio wajib diisi',
            'settings.about_header.required' => 'Header halaman about wajib diisi',
            'settings.contact_header.required' => 'Header halaman kontak wajib diisi',
            'settings.footer_copyright.required' => 'Copyright footer wajib diisi',
            'settings.loading_text.required' => 'Teks loading screen wajib diisi',
            'settings.admin_title.required' => 'Judul admin dashboard wajib diisi',
            'settings.admin_brand.required' => 'Brand admin sidebar wajib diisi',
            'settings.contact_whatsapp.required' => 'Nomor WhatsApp wajib diisi',
            'settings.contact_instagram.required' => 'Username Instagram wajib diisi',
            'settings.contact_email.required' => 'Email kontak wajib diisi',
            'settings.contact_email.email' => 'Format email tidak valid',
        ]);

        try {
            // Update or create each setting
            foreach ($request->settings as $key => $value) {
                WebsiteSetting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $value,
                        'type' => $this->getFieldType($key),
                        'label' => $this->getFieldLabel($key),
                        'is_active' => true
                    ]
                );
            }

            // Create notification
            $this->createWebsiteNotification();

            return redirect()->route('admin.website.index')
                ->with('success', 'Pengaturan website berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.website.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui pengaturan: ' . $e->getMessage());
        }
    }

    /**
     * Get setting value by key with default
     */
    private function getSetting($key, $default = null)
    {
        try {
            $setting = WebsiteSetting::where('key', $key)->where('is_active', true)->first();
            return $setting ? $setting->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }

    /**
     * Get field type based on key
     */
    private function getFieldType($key)
    {
        $textareaFields = ['site_description', 'portfolio_subtitle', 'contact_subtitle'];
        return in_array($key, $textareaFields) ? 'textarea' : 'text';
    }

    /**
     * Get field label based on key
     */
    private function getFieldLabel($key)
    {
        $labels = [
            'site_name' => 'Nama Website',
            'site_tagline' => 'Tagline Website',
            'site_description' => 'Deskripsi Website',
            'home_title' => 'Judul Halaman Beranda',
            'portfolio_title' => 'Judul Halaman Portofolio',
            'about_title' => 'Judul Halaman About',
            'contact_title' => 'Judul Halaman Kontak',
            'home_header' => 'Header Halaman Beranda',
            'portfolio_header' => 'Header Halaman Portofolio',
            'portfolio_subtitle' => 'Subtitle Portofolio',
            'about_header' => 'Header Halaman About',
            'contact_header' => 'Header Halaman Kontak',
            'contact_subtitle' => 'Subtitle Kontak',
            'footer_copyright' => 'Copyright Footer',
            'loading_text' => 'Teks Loading Screen',
            'admin_title' => 'Judul Admin Dashboard',
            'admin_brand' => 'Brand Admin Sidebar',
            'contact_whatsapp' => 'Nomor WhatsApp',
            'contact_instagram' => 'Username Instagram',
            'contact_email' => 'Email Kontak',
        ];

        return $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Traits\CreatesNotifications;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use CreatesNotifications;
    /**
     * Display the contact settings management page
     */
    public function index()
    {
        // Get current contact settings with default values
        $settings = [
            'company_name' => $this->getSetting('company_name', 'LittleStar Studio'),
            'company_tagline' => $this->getSetting('company_tagline', 'Creative Digital Solutions'),
            'contact_email' => $this->getSetting('contact_email', 'hello@littlestar.studio'),
            'contact_phone' => $this->getSetting('contact_phone', '+62 812-3456-7890'),
            'contact_whatsapp' => $this->getSetting('contact_whatsapp', '+62 812-3456-7890'),
            'operating_hours' => $this->getSetting('operating_hours', "Senin - Jumat: 09:00 - 18:00\nSabtu: 09:00 - 15:00\nMinggu: Tutup"),
            'social_instagram' => $this->getSetting('social_instagram', 'https://instagram.com/littlestarstudio'),
            'social_tiktok' => $this->getSetting('social_tiktok', 'https://tiktok.com/@littlestarstudio'),
        ];
        
        return view('admin.contact.index', compact('settings'));
    }

    /**
     * Update contact settings
     */
    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.company_name' => 'required|string|max:255',
            'settings.contact_email' => 'required|email|max:255',
            'settings.contact_phone' => 'required|string|max:50',
            'settings.operating_hours' => 'required|string|max:500',
            'settings.company_tagline' => 'nullable|string|max:255',
            'settings.contact_whatsapp' => 'nullable|string|max:50',
            'settings.social_instagram' => 'nullable|url|max:255',
            'settings.social_tiktok' => 'nullable|url|max:255',
        ], [
            'settings.company_name.required' => 'Nama perusahaan wajib diisi',
            'settings.contact_email.required' => 'Email kontak wajib diisi',
            'settings.contact_email.email' => 'Format email tidak valid',
            'settings.contact_phone.required' => 'Nomor telepon wajib diisi',
            'settings.operating_hours.required' => 'Jam operasional wajib diisi',
            'settings.*.url' => 'Format URL tidak valid (harus dimulai dengan http:// atau https://)',
        ]);

        try {
            // Update or create each setting
            foreach ($request->settings as $key => $value) {
                ContactSetting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $value,
                        'type' => $this->getFieldType($key),
                        'group' => $this->getFieldGroup($key),
                        'label' => $this->getFieldLabel($key),
                        'is_active' => true
                    ]
                );
            }

            // Create notification
            $this->createContactNotification();

            return redirect()->route('admin.contact.index')
                ->with('success', 'Informasi kontak berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.contact.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui informasi: ' . $e->getMessage());
        }
    }

    /**
     * Get field type based on key
     */
    private function getFieldType($key)
    {
        $types = [
            'contact_email' => 'email',
            'contact_phone' => 'phone',
            'contact_whatsapp' => 'phone',

            'social_instagram' => 'url',
            'social_tiktok' => 'url',

            'operating_hours' => 'textarea',
        ];

        return $types[$key] ?? 'text';
    }

    /**
     * Get field group based on key
     */
    private function getFieldGroup($key)
    {
        if (str_starts_with($key, 'social_')) {
            return 'social';
        }
        

        
        if (str_starts_with($key, 'hours_') || $key === 'operating_hours') {
            return 'hours';
        }
        
        return 'general';
    }

    /**
     * Get field label based on key
     */
    private function getFieldLabel($key)
    {
        $labels = [
            'company_name' => 'Nama Perusahaan',
            'company_tagline' => 'Tagline',
            'contact_email' => 'Email Kontak',
            'contact_phone' => 'Nomor Telepon',
            'contact_whatsapp' => 'WhatsApp',

            'operating_hours' => 'Jam Operasional',
            'social_instagram' => 'Instagram',
            'social_tiktok' => 'TikTok',
        ];

        return $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
    }

    /**
     * Get setting value by key with default
     */
    private function getSetting($key, $default = null)
    {
        try {
            $setting = ContactSetting::where('key', $key)->where('is_active', true)->first();
            return $setting ? $setting->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }
}
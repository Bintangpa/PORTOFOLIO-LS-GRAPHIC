<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Traits\CreatesNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NavbarController extends Controller
{
    use CreatesNotifications;
    /**
     * Display the navbar settings management page
     */
    public function index()
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengakses pengaturan navbar.');
        }

        // Get current navbar settings with default values
        $settings = [
            'navbar_title' => $this->getSetting('navbar_title', 'LittleStar Studio'),
            'navbar_logo' => $this->getSetting('navbar_logo', 'images/logo-ls-biru.png'),
            'navbar_logo_height' => $this->getSetting('navbar_logo_height', '85'),
            'navbar_logo_width' => $this->getSetting('navbar_logo_width', 'auto'),
            'navbar_show_title' => $this->getSetting('navbar_show_title', '1'),
            'navbar_show_logo' => $this->getSetting('navbar_show_logo', '1'),
            
            // Menu names
            'navbar_menu_home' => $this->getSetting('navbar_menu_home', 'Beranda'),
            'navbar_menu_portfolio' => $this->getSetting('navbar_menu_portfolio', 'Portofolio'),
            'navbar_menu_about' => $this->getSetting('navbar_menu_about', 'Tentang'),
            'navbar_menu_contact' => $this->getSetting('navbar_menu_contact', 'Kontak'),
            'navbar_menu_dashboard' => $this->getSetting('navbar_menu_dashboard', 'Dashboard'),
            'navbar_search_placeholder' => $this->getSetting('navbar_search_placeholder', 'Cari portofolio...'),
        ];
        
        return view('admin.navbar.index', compact('settings'));
    }

    /**
     * Update navbar settings
     */
    public function update(Request $request)
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengubah pengaturan navbar.');
        }
        
        // Log admin activity
        \Log::info('Admin mengubah pengaturan navbar', [
            'admin_id' => auth()->id(),
            'admin_name' => auth()->user()->name,
            'timestamp' => now()
        ]);

        $request->validate([
            'navbar_title' => 'required|string|max:255',
            'navbar_logo_height' => 'required|numeric|min:20|max:200',
            'navbar_logo_width' => 'nullable|string|max:50',
            'navbar_show_title' => 'required|boolean',
            'navbar_show_logo' => 'required|boolean',
            'navbar_logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            // Menu names validation
            'navbar_menu_home' => 'required|string|max:50',
            'navbar_menu_portfolio' => 'required|string|max:50',
            'navbar_menu_about' => 'required|string|max:50',
            'navbar_menu_contact' => 'required|string|max:50',
            'navbar_menu_dashboard' => 'required|string|max:50',
            'navbar_search_placeholder' => 'required|string|max:100',
        ], [
            'navbar_title.required' => 'Judul navbar wajib diisi',
            'navbar_title.max' => 'Judul navbar maksimal 255 karakter',
            'navbar_logo_height.required' => 'Tinggi logo wajib diisi',
            'navbar_logo_height.numeric' => 'Tinggi logo harus berupa angka',
            'navbar_logo_height.min' => 'Tinggi logo minimal 20px',
            'navbar_logo_height.max' => 'Tinggi logo maksimal 200px',
            'navbar_logo_width.max' => 'Lebar logo maksimal 50 karakter',
            'navbar_show_title.required' => 'Pilihan tampilkan judul wajib dipilih',
            'navbar_show_logo.required' => 'Pilihan tampilkan logo wajib dipilih',
            'navbar_logo_file.image' => 'File harus berupa gambar',
            'navbar_logo_file.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg',
            'navbar_logo_file.max' => 'Ukuran file maksimal 2MB',
            
            // Menu names validation messages
            'navbar_menu_home.required' => 'Nama menu Beranda wajib diisi',
            'navbar_menu_home.max' => 'Nama menu Beranda maksimal 50 karakter',
            'navbar_menu_portfolio.required' => 'Nama menu Portofolio wajib diisi',
            'navbar_menu_portfolio.max' => 'Nama menu Portofolio maksimal 50 karakter',
            'navbar_menu_about.required' => 'Nama menu Tentang wajib diisi',
            'navbar_menu_about.max' => 'Nama menu Tentang maksimal 50 karakter',
            'navbar_menu_contact.required' => 'Nama menu Kontak wajib diisi',
            'navbar_menu_contact.max' => 'Nama menu Kontak maksimal 50 karakter',
            'navbar_menu_dashboard.required' => 'Nama menu Dashboard wajib diisi',
            'navbar_menu_dashboard.max' => 'Nama menu Dashboard maksimal 50 karakter',
            'navbar_search_placeholder.required' => 'Placeholder pencarian wajib diisi',
            'navbar_search_placeholder.max' => 'Placeholder pencarian maksimal 100 karakter',
        ]);

        try {
            $logoPath = $this->getSetting('navbar_logo', 'images/logo-ls-biru.png');

            // Handle logo upload
            if ($request->hasFile('navbar_logo_file')) {
                $file = $request->file('navbar_logo_file');
                $filename = 'navbar-logo-' . time() . '.' . $file->getClientOriginalExtension();
                
                // Store in public/images directory
                $file->move(public_path('images'), $filename);
                $logoPath = 'images/' . $filename;

                // Delete old logo if it's not the default one
                $oldLogo = $this->getSetting('navbar_logo');
                if ($oldLogo && $oldLogo !== 'images/logo-ls-biru.png' && file_exists(public_path($oldLogo))) {
                    unlink(public_path($oldLogo));
                }
            }

            // Prepare settings data
            $settings = [
                'navbar_title' => $request->navbar_title,
                'navbar_logo' => $logoPath,
                'navbar_logo_height' => $request->navbar_logo_height,
                'navbar_logo_width' => $request->navbar_logo_width ?: 'auto',
                'navbar_show_title' => $request->navbar_show_title ? '1' : '0',
                'navbar_show_logo' => $request->navbar_show_logo ? '1' : '0',
                
                // Menu names
                'navbar_menu_home' => $request->navbar_menu_home,
                'navbar_menu_portfolio' => $request->navbar_menu_portfolio,
                'navbar_menu_about' => $request->navbar_menu_about,
                'navbar_menu_contact' => $request->navbar_menu_contact,
                'navbar_menu_dashboard' => $request->navbar_menu_dashboard,
                'navbar_search_placeholder' => $request->navbar_search_placeholder,
            ];

            // Update or create each setting
            foreach ($settings as $key => $value) {
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
            $this->createNavbarNotification();

            return redirect()->route('admin.navbar.index')
                ->with('success', 'Pengaturan navbar berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.navbar.index')
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
        $numericFields = ['navbar_logo_height'];
        $booleanFields = ['navbar_show_title', 'navbar_show_logo'];
        
        if (in_array($key, $numericFields)) {
            return 'number';
        } elseif (in_array($key, $booleanFields)) {
            return 'boolean';
        }
        
        return 'text';
    }

    /**
     * Get field label based on key
     */
    private function getFieldLabel($key)
    {
        $labels = [
            'navbar_title' => 'Judul Navbar',
            'navbar_logo' => 'Logo Navbar',
            'navbar_logo_height' => 'Tinggi Logo (px)',
            'navbar_logo_width' => 'Lebar Logo',
            'navbar_show_title' => 'Tampilkan Judul',
            'navbar_show_logo' => 'Tampilkan Logo',
            
            // Menu names
            'navbar_menu_home' => 'Nama Menu Beranda',
            'navbar_menu_portfolio' => 'Nama Menu Portofolio',
            'navbar_menu_about' => 'Nama Menu Tentang',
            'navbar_menu_contact' => 'Nama Menu Kontak',
            'navbar_menu_dashboard' => 'Nama Menu Dashboard',
            'navbar_search_placeholder' => 'Placeholder Pencarian',
        ];

        return $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
    }
}
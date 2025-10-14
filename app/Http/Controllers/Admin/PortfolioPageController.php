<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use App\Models\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PortfolioPageController extends Controller
{
    /**
     * Display the portfolio page control panel
     */
    public function index()
    {
        try {
            // Get all portfolio page settings
            $settings = [
                // Page Title & Meta
                'portfolio_title' => WebsiteSetting::getValue('portfolio_title', 'Portofolio'),
                
                // Header Section
                'portfolio_header' => WebsiteSetting::getValue('portfolio_header', 'Portofolio Kami'),
                'portfolio_subtitle' => WebsiteSetting::getValue('portfolio_subtitle', 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio'),
                
                // Search Section
                'portfolio_search_placeholder' => WebsiteSetting::getValue('portfolio_search_placeholder', 'Cari portofolio berdasarkan judul, deskripsi, kategori, atau klien...'),
                'portfolio_search_button' => WebsiteSetting::getValue('portfolio_search_button', 'Cari'),
                'portfolio_reset_button' => WebsiteSetting::getValue('portfolio_reset_button', 'Reset'),
                
                // Filter Section
                'portfolio_filter_label' => WebsiteSetting::getValue('portfolio_filter_label', 'Filter kategori:'),
                'portfolio_filter_all' => WebsiteSetting::getValue('portfolio_filter_all', 'Semua'),
                
                // Search Results
                'portfolio_search_results_for' => WebsiteSetting::getValue('portfolio_search_results_for', 'Menampilkan hasil pencarian untuk:'),
                'portfolio_search_category' => WebsiteSetting::getValue('portfolio_search_category', 'Menampilkan portofolio kategori:'),
                'portfolio_search_results_found' => WebsiteSetting::getValue('portfolio_search_results_found', 'hasil ditemukan'),
                
                // Empty States
                'portfolio_no_results_title' => WebsiteSetting::getValue('portfolio_no_results_title', 'Tidak ada hasil ditemukan'),
                'portfolio_no_results_message' => WebsiteSetting::getValue('portfolio_no_results_message', 'Coba gunakan kata kunci yang berbeda atau'),
                'portfolio_no_results_link' => WebsiteSetting::getValue('portfolio_no_results_link', 'lihat semua portofolio'),
                'portfolio_empty_title' => WebsiteSetting::getValue('portfolio_empty_title', 'Belum ada portofolio'),
                'portfolio_empty_message' => WebsiteSetting::getValue('portfolio_empty_message', 'Portofolio akan segera ditampilkan di sini'),
                
                // Pagination
                'portfolio_pagination_showing' => WebsiteSetting::getValue('portfolio_pagination_showing', 'Menampilkan'),
                'portfolio_pagination_of' => WebsiteSetting::getValue('portfolio_pagination_of', 'dari'),
                'portfolio_pagination_portfolios' => WebsiteSetting::getValue('portfolio_pagination_portfolios', 'portofolio'),
                
                // Social Media Links (Only Instagram, TikTok, WhatsApp, Email)
                'portfolio_social_instagram' => WebsiteSetting::getValue('portfolio_social_instagram', ''),
                'portfolio_social_tiktok' => WebsiteSetting::getValue('portfolio_social_tiktok', ''),
                'portfolio_social_whatsapp' => WebsiteSetting::getValue('portfolio_social_whatsapp', ''),
                'portfolio_social_email' => WebsiteSetting::getValue('portfolio_social_email', ''),
                
                // Social Media Section Settings
                'portfolio_social_title' => WebsiteSetting::getValue('portfolio_social_title', 'Ikuti Kami'),
                'portfolio_social_subtitle' => WebsiteSetting::getValue('portfolio_social_subtitle', 'Dapatkan update terbaru dari karya-karya kami'),
                'portfolio_show_social' => WebsiteSetting::getValue('portfolio_show_social', '1'),
            ];

            Log::info('Portfolio Page Settings Loaded:', $settings);
            return view('admin.portfolio-page.index', compact('settings'));
            
        } catch (\Exception $e) {
            Log::error('Error loading portfolio page settings: ' . $e->getMessage());
            return redirect()->route('admin.portfolios.index')->with('error', 'Gagal memuat pengaturan halaman portofolio.');
        }
    }

    /**
     * Update portfolio page settings
     */
    public function update(Request $request)
    {
        try {
            // Debug: Log the incoming request
            Log::info('Portfolio Page Update Request:', $request->all());
            
            // Handle checkbox for social media display
            $settings = $request->input('settings', []);
            
            // Ensure checkbox value is properly handled
            if (!isset($settings['portfolio_show_social'])) {
                $settings['portfolio_show_social'] = '0';
            }
            
            // Basic validation with more lenient rules
            $rules = [
                'settings.portfolio_title' => 'required|string|max:200',
                'settings.portfolio_header' => 'required|string|max:500',
                'settings.portfolio_subtitle' => 'required|string|max:1000',
                'settings.portfolio_search_placeholder' => 'required|string|max:500',
                'settings.portfolio_search_button' => 'required|string|max:100',
                'settings.portfolio_reset_button' => 'required|string|max:100',
                'settings.portfolio_filter_label' => 'required|string|max:200',
                'settings.portfolio_filter_all' => 'required|string|max:100',
                'settings.portfolio_search_results_for' => 'required|string|max:200',
                'settings.portfolio_search_category' => 'required|string|max:200',
                'settings.portfolio_search_results_found' => 'required|string|max:200',
                'settings.portfolio_no_results_title' => 'required|string|max:200',
                'settings.portfolio_no_results_message' => 'required|string|max:500',
                'settings.portfolio_no_results_link' => 'required|string|max:200',
                'settings.portfolio_empty_title' => 'required|string|max:200',
                'settings.portfolio_empty_message' => 'required|string|max:500',
                'settings.portfolio_pagination_showing' => 'required|string|max:100',
                'settings.portfolio_pagination_of' => 'required|string|max:100',
                'settings.portfolio_pagination_portfolios' => 'required|string|max:100',
                'settings.portfolio_social_instagram' => 'nullable|string|max:500',
                'settings.portfolio_social_tiktok' => 'nullable|string|max:500',
                'settings.portfolio_social_whatsapp' => 'nullable|string|max:500',
                'settings.portfolio_social_email' => 'nullable|string|max:500',
                'settings.portfolio_social_title' => 'required|string|max:200',
                'settings.portfolio_social_subtitle' => 'required|string|max:500',
                'settings.portfolio_show_social' => 'required|in:0,1',
            ];
            
            $validator = Validator::make(['settings' => $settings], $rules);

            if ($validator->fails()) {
                Log::error('Portfolio Page Validation Failed:', $validator->errors()->toArray());
                return redirect()->back()
                               ->withErrors($validator)
                               ->withInput()
                               ->with('error', 'Terjadi kesalahan validasi: ' . $validator->errors()->first());
            }

            $updatedSettings = [];
            $successCount = 0;

            // Update each setting
            foreach ($settings as $key => $value) {
                try {
                    // Clean the value
                    $cleanValue = is_string($value) ? trim($value) : $value;
                    
                    // Save to database
                    $result = WebsiteSetting::setValue($key, $cleanValue);
                    
                    if ($result) {
                        $updatedSettings[] = $key;
                        $successCount++;
                        Log::info("Successfully updated setting: {$key} = {$cleanValue}");
                    } else {
                        Log::warning("Failed to update setting: {$key}");
                    }
                } catch (\Exception $e) {
                    Log::error("Error updating setting {$key}: " . $e->getMessage());
                }
            }

            if ($successCount > 0) {
                // Create notification
                try {
                    AdminNotification::create([
                        'type' => 'portfolio_page',
                        'title' => 'Portfolio Page Settings Updated',
                        'message' => "Portfolio page settings have been successfully updated. {$successCount} settings changed.",
                        'icon' => 'fas fa-briefcase',
                        'is_read' => false,
                        'created_by' => auth()->id(),
                        'data' => json_encode([
                            'updated_settings' => $updatedSettings,
                            'user' => auth()->user()->name,
                            'timestamp' => now()->toISOString(),
                            'success_count' => $successCount
                        ])
                    ]);
                } catch (\Exception $e) {
                    Log::warning('Failed to create notification: ' . $e->getMessage());
                }

                return redirect()->back()->with('success', "Pengaturan halaman portofolio berhasil diperbarui! ({$successCount} pengaturan diubah)");
            } else {
                return redirect()->back()->with('error', 'Tidak ada pengaturan yang berhasil diperbarui.');
            }

        } catch (\Exception $e) {
            Log::error('Portfolio Page Settings Update Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Terjadi kesalahan saat menyimpan pengaturan: ' . $e->getMessage());
        }
    }
}
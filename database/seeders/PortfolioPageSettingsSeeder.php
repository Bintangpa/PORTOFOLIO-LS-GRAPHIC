<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class PortfolioPageSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'portfolio_title' => 'Portofolio',
            'portfolio_header' => 'Portofolio Kami',
            'portfolio_subtitle' => 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio',
            'portfolio_search_placeholder' => 'Cari portofolio berdasarkan judul, deskripsi, kategori, atau klien...',
            'portfolio_search_button' => 'Cari',
            'portfolio_reset_button' => 'Reset',
            'portfolio_filter_label' => 'Filter kategori:',
            'portfolio_filter_all' => 'Semua',
            'portfolio_search_results_for' => 'Menampilkan hasil pencarian untuk:',
            'portfolio_search_category' => 'Menampilkan portofolio kategori:',
            'portfolio_search_results_found' => 'hasil ditemukan',
            'portfolio_no_results_title' => 'Tidak ada hasil ditemukan',
            'portfolio_no_results_message' => 'Coba gunakan kata kunci yang berbeda atau',
            'portfolio_no_results_link' => 'lihat semua portofolio',
            'portfolio_empty_title' => 'Belum ada portofolio',
            'portfolio_empty_message' => 'Portofolio akan segera ditampilkan di sini',
            'portfolio_pagination_showing' => 'Menampilkan',
            'portfolio_pagination_of' => 'dari',
            'portfolio_pagination_portfolios' => 'portofolio',
            'portfolio_social_instagram' => '',
            'portfolio_social_tiktok' => '',
            'portfolio_social_whatsapp' => '',
            'portfolio_social_email' => '',
            'portfolio_social_title' => 'Ikuti Kami',
            'portfolio_social_subtitle' => 'Dapatkan update terbaru dari karya-karya kami',
            'portfolio_show_social' => '1',
        ];

        foreach ($settings as $key => $value) {
            WebsiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => 'text',
                    'label' => ucfirst(str_replace('_', ' ', $key)),
                    'is_active' => true
                ]
            );
        }
    }
}
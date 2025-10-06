<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get the first admin user or create one
        $user = User::where('role', 'admin')->first();
        
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
            ]);
        }

        // Create sample portfolios
        $portfolios = [
            [
                'title' => 'Website E-Commerce Modern',
                'description' => 'Pengembangan website e-commerce dengan fitur lengkap untuk toko online modern. Dilengkapi dengan sistem pembayaran, manajemen produk, dan dashboard admin yang user-friendly.',
                'category' => 'Web Development',
                'client' => 'PT. Digital Store',
                'project_date' => '2024-01-15',
                'image_path' => 'portfolios/sample-ecommerce.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Aplikasi Mobile Banking',
                'description' => 'Desain UI/UX untuk aplikasi mobile banking dengan fokus pada keamanan dan kemudahan penggunaan. Interface yang clean dan modern untuk pengalaman pengguna yang optimal.',
                'category' => 'Mobile App',
                'client' => 'Bank Digital Indonesia',
                'project_date' => '2024-02-20',
                'image_path' => 'portfolios/sample-banking.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Brand Identity Startup Tech',
                'description' => 'Pembuatan brand identity lengkap untuk startup teknologi, termasuk logo design, color palette, typography, dan brand guidelines yang komprehensif.',
                'category' => 'Branding',
                'client' => 'TechStart Innovation',
                'project_date' => '2024-03-10',
                'image_path' => 'portfolios/sample-branding.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Dashboard Analytics',
                'description' => 'Pengembangan dashboard analytics untuk monitoring data bisnis real-time. Dilengkapi dengan visualisasi data yang interaktif dan reporting otomatis.',
                'category' => 'Web Development',
                'client' => 'Data Analytics Corp',
                'project_date' => '2024-04-05',
                'image_path' => 'portfolios/sample-dashboard.jpg',
                'user_id' => $user->id,
            ],
            [
                'title' => 'Landing Page Produk',
                'description' => 'Desain dan pengembangan landing page yang conversion-focused untuk peluncuran produk baru. Optimized untuk SEO dan mobile responsive.',
                'category' => 'Web Design',
                'client' => 'Product Launch Co',
                'project_date' => '2024-05-12',
                'image_path' => 'portfolios/sample-landing.jpg',
                'user_id' => $user->id,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
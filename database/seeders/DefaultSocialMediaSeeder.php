<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class DefaultSocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        $socialSettings = [
            'portfolio_social_instagram' => 'https://instagram.com/littlestarstudio',
            'portfolio_social_tiktok' => 'https://tiktok.com/@littlestarstudio',
            'portfolio_social_whatsapp' => '628123456789',
            'portfolio_social_email' => 'contact@littlestarstudio.com',
            'portfolio_social_title' => 'Ikuti Kami',
            'portfolio_social_subtitle' => 'Dapatkan update terbaru dari karya-karya kami',
            'portfolio_show_social' => '1',
        ];

        foreach ($socialSettings as $key => $value) {
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
        
        echo "Default social media settings created successfully!\n";
    }
}
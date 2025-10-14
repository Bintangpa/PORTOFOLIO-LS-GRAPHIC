<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WebsiteSetting;

class SetupSocialMedia extends Command
{
    protected $signature = 'setup:social-media';
    protected $description = 'Setup default social media settings for portfolio page';

    public function handle()
    {
        $this->info('Setting up default social media settings...');
        
        $socialSettings = [
            'portfolio_social_instagram' => 'https://instagram.com/littlestarstudio',
            'portfolio_social_tiktok' => 'https://tiktok.com/@littlestarstudio',
            'portfolio_social_whatsapp' => '628123456789',
            'portfolio_social_email' => 'contact@littlestarstudio.com',
            'portfolio_social_title' => 'Ikuti Kami',
            'portfolio_social_subtitle' => 'Dapatkan update terbaru dari karya-karya kami',
            'portfolio_show_social' => '1',
        ];

        $count = 0;
        foreach ($socialSettings as $key => $value) {
            $result = WebsiteSetting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => 'text',
                    'label' => ucfirst(str_replace('_', ' ', $key)),
                    'is_active' => true
                ]
            );
            
            if ($result) {
                $count++;
                $this->line("✓ {$key}: {$value}");
            }
        }
        
        $this->info("Successfully created {$count} social media settings!");
        $this->info('Social media section is now visible on portfolio page.');
        $this->info('You can customize these settings in Admin > Portfolio Page Control');
    }
}
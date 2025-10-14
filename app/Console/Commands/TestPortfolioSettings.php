<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WebsiteSetting;

class TestPortfolioSettings extends Command
{
    protected $signature = 'test:portfolio-settings';
    protected $description = 'Test portfolio page settings functionality';

    public function handle()
    {
        $this->info('Testing Portfolio Page Settings...');
        
        try {
            // Test database connection
            $this->info('1. Testing database connection...');
            $count = WebsiteSetting::count();
            $this->info("   Found {$count} settings in database");
            
            // Test setValue
            $this->info('2. Testing setValue...');
            $testKey = 'test_portfolio_setting';
            $testValue = 'Test Value ' . now();
            $result = WebsiteSetting::setValue($testKey, $testValue);
            $this->info("   setValue result: " . ($result ? 'SUCCESS' : 'FAILED'));
            
            // Test getValue
            $this->info('3. Testing getValue...');
            $retrievedValue = WebsiteSetting::getValue($testKey, 'DEFAULT');
            $this->info("   Retrieved value: {$retrievedValue}");
            $this->info("   Match: " . ($retrievedValue === $testValue ? 'YES' : 'NO'));
            
            // Test portfolio settings
            $this->info('4. Testing portfolio settings...');
            $portfolioTitle = WebsiteSetting::getValue('portfolio_title', 'DEFAULT');
            $this->info("   Portfolio title: {$portfolioTitle}");
            
            // Clean up test setting
            WebsiteSetting::where('key', $testKey)->delete();
            $this->info('5. Cleaned up test setting');
            
            $this->info('All tests completed successfully!');
            
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
        }
    }
}
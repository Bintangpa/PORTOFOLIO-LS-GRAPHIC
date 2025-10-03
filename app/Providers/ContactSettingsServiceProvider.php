<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactSetting;

class ContactSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share contact settings with all views
        View::composer('*', function ($view) {
            try {
                $contactSettings = ContactSetting::getAllGrouped();
                $view->with('contactSettings', $contactSettings);
            } catch (\Exception $e) {
                // Handle case where table doesn't exist yet (during migration)
                $view->with('contactSettings', collect());
            }
        });

        // Register helper functions
        if (!function_exists('contact_setting')) {
            function contact_setting($key, $default = null) {
                return ContactSetting::getValue($key, $default);
            }
        }
    }
}
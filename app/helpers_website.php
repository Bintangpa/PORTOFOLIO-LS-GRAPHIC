<?php

use App\Models\WebsiteSetting;

if (!function_exists('website_setting')) {
    /**
     * Get website setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function website_setting($key, $default = null)
    {
        try {
            return WebsiteSetting::getValue($key, $default);
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('site_name')) {
    /**
     * Get site name
     *
     * @return string
     */
    function site_name()
    {
        return website_setting('site_name', 'LittleStar Studio');
    }
}

if (!function_exists('site_title')) {
    /**
     * Generate page title with site name
     *
     * @param string $page
     * @return string
     */
    function site_title($page = null)
    {
        $siteName = site_name();
        return $page ? "{$page} - {$siteName}" : $siteName;
    }
}
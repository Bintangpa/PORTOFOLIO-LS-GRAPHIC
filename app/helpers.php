<?php

use App\Models\ContactSetting;

if (!function_exists('contact_setting')) {
    /**
     * Get contact setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function contact_setting($key, $default = null)
    {
        try {
            return ContactSetting::getValue($key, $default);
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('contact_settings_group')) {
    /**
     * Get contact settings by group
     *
     * @param string $group
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function contact_settings_group($group)
    {
        try {
            return ContactSetting::getByGroup($group);
        } catch (\Exception $e) {
            return collect();
        }
    }
}

if (!function_exists('all_contact_settings')) {
    /**
     * Get all contact settings grouped
     *
     * @return \Illuminate\Support\Collection
     */
    function all_contact_settings()
    {
        try {
            return ContactSetting::getAllGrouped();
        } catch (\Exception $e) {
            return collect();
        }
    }
}
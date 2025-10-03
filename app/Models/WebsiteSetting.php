<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'label',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get setting value by key
     */
    public static function getValue($key, $default = null)
    {
        try {
            $setting = self::where('key', $key)->where('is_active', true)->first();
            return $setting ? $setting->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }

    /**
     * Set setting value
     */
    public static function setValue($key, $value)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'is_active' => true]
        );
    }

    /**
     * Get all active settings as key-value pairs
     */
    public static function getAllSettings()
    {
        try {
            return self::where('is_active', true)
                       ->pluck('value', 'key')
                       ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }
}
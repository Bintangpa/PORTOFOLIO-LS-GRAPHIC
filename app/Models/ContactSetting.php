<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get settings by group
     */
    public static function getByGroup($group)
    {
        return self::where('group', $group)
                   ->where('is_active', true)
                   ->orderBy('sort_order')
                   ->get();
    }

    /**
     * Get setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = self::where('key', $key)->where('is_active', true)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting value
     */
    public static function setValue($key, $value)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Get all settings grouped
     */
    public static function getAllGrouped()
    {
        return self::where('is_active', true)
                   ->orderBy('group')
                   ->orderBy('sort_order')
                   ->get()
                   ->groupBy('group');
    }
}
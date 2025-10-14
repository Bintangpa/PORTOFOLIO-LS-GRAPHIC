<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AdminNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'type',
        'icon',
        'is_read',
        'action_type',
        'related_id',
        'related_type'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get formatted time ago
     */
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get notification color based on type
     */
    public function getColorAttribute()
    {
        $colors = [
            'portfolio' => 'primary',
            'navbar' => 'info',
            'website' => 'warning',
            'contact' => 'success',
            'about' => 'secondary',
            'account' => 'dark',
            'system' => 'danger'
        ];

        return $colors[$this->type] ?? 'primary';
    }

    /**
     * Create a new notification
     */
    public static function create_notification($userId, $title, $message, $type, $icon, $actionType = null, $relatedId = null, $relatedType = null)
    {
        return self::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'icon' => $icon,
            'action_type' => $actionType,
            'related_id' => $relatedId,
            'related_type' => $relatedType,
            'is_read' => false
        ]);
    }

    /**
     * Get unread notifications count
     */
    public static function getUnreadCount($userId)
    {
        return self::where('user_id', $userId)
                   ->where('is_read', false)
                   ->count();
    }

    /**
     * Get recent notifications
     */
    public static function getRecent($userId, $limit = 10)
    {
        return self::where('user_id', $userId)
                   ->orderBy('created_at', 'desc')
                   ->limit($limit)
                   ->get();
    }

    /**
     * Mark as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    /**
     * Mark all as read for user
     */
    public static function markAllAsRead($userId)
    {
        self::where('user_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get notifications for the authenticated admin
     */
    public function index(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        $notifications = AdminNotification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        if ($request->ajax()) {
            return response()->json([
                'notifications' => $notifications->items(),
                'unread_count' => AdminNotification::getUnreadCount(auth()->id())
            ]);
        }

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Get recent notifications for dropdown
     */
    public function recent()
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notifications = AdminNotification::getRecent(auth()->id(), 10);
        $unreadCount = AdminNotification::getUnreadCount(auth()->id());

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification = AdminNotification::where('user_id', auth()->id())
            ->findOrFail($id);
        
        $notification->markAsRead();

        return response()->json([
            'success' => true,
            'unread_count' => AdminNotification::getUnreadCount(auth()->id())
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        AdminNotification::markAllAsRead(auth()->id());

        return response()->json([
            'success' => true,
            'unread_count' => 0
        ]);
    }

    /**
     * Delete notification
     */
    public function destroy($id)
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification = AdminNotification::where('user_id', auth()->id())
            ->findOrFail($id);
        
        $notification->delete();

        return response()->json([
            'success' => true,
            'unread_count' => AdminNotification::getUnreadCount(auth()->id())
        ]);
    }
}
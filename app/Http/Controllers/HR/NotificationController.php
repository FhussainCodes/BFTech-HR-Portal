<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;

class NotificationController extends Controller
{
    public function index()
    {
        $hr = Register::where('role', 'hr')->first();

        $notifications = $hr->notifications()
            ->latest()
            ->paginate(10);

        return view('hr.notifications.index', compact('notifications'));
    }

    public function read($id)
    {
        $hr = Register::where('role', 'hr')->first();

        $notification = $hr->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        $leaveId = $notification->data['leave_id'];

        return redirect()->route('hr.leave.show', $leaveId);
    }

    public function markAllAsRead()
    {
        $hr = Register::where('role', 'hr')->first();

        $hr->unreadNotifications->markAsRead();

        return redirect()
            ->back()
            ->with('success', 'All notifications marked as read.');
    }
}

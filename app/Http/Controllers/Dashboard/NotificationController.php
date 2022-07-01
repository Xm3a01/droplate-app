<?php

namespace App\Http\Controllers\Dashboard;

use App\Helper\Notification as HelperNotification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CeneralNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function create()
    {
        return view('app.notification.create');
    }


    public function send(Request $request)
    {
        Notification::send(User::all(), new CeneralNotification($request));
        HelperNotification::send($request);
        Session::flash('success', 'Your Notification send successfully');
        return back();
        // Notification::send(new Se)
    }
}

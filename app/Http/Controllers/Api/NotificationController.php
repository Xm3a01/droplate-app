<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('sanctum')->user();

        return NotificationResource::collection($user->notifications);
        
    }

    public function readed($id)
    {
        Notification::find($id)->markAsRead();  
        
        return 'done';
        
    }

    public function unReaded($id)
    {
        Notification::find($id)->markAsRead();   
        
    }

    
}

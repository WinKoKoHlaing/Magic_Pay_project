<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index(){
        $user = auth()->guard('web')->user();
        $notifications = $user->notifications()->paginate(5);
        // return $notifications;
        return view('frontend.notification',compact('notifications'));
    }

    public function detail($id){
        $user = auth()->guard('web')->user();
        $notification = $user->notifications()->where('id',$id)->first();
        $notification->markAsRead();
        // return $notification;
        return view('frontend.notification_detail',compact('notification'));
    }
}

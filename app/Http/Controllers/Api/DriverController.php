<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin as Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\OrderNotificationResource;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Auth::guard('sanctum')->user();
        // return $driver;
        $notification = $driver->unreadNotifications; 

        return OrderNotificationResource::collection($notification);
    }

    public function confirm($id)
    {
        $driver = Driver::find(Auth::guard('sanctum')->user()->id);
        $notification = $driver->unreadNotifications()->find($id);
        $jsonNotify = json_decode($notification);
        $order_id = $jsonNotify->data->order_id;

        $order = Order::find($order_id);

        $order->driver_id =  $driver->id;
        $driver->busy =  Driver::BUSY;
        $order->save();
        $driver->save();

        $notification->markAsRead();

        return new OrderResource($order);

    }

    public function order()
    {
        $driver = Driver::find(Auth::guard('sanctum')->user()->id);
        return OrderResource::collection($driver->orders);
    }


    public function history()
    {
        $driver = Auth::guard('sanctum')->user();
        // return $driver;
        $notification = $driver->readNotifications; 

        return OrderNotificationResource::collection($notification);
    }


    public function delivered($id)
    {
        $order = Order::find($id);
        $driver = Driver::find(Auth::guard('sanctum')->user()->id);
        $order->order_status =  Order::DONE;
        $driver->busy = Driver::NOTBUSY;
        $driver->save();
        $order->save();
    }
}

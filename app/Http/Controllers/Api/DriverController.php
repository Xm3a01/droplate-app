<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Admin as Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\OrderNotificationResource;
use App\Http\Resources\UserResource;

class DriverController extends Controller
{


    public function profile()
    {
        $driver = Auth::guard('sanctum')->user();

        return new UserResource($driver);
    }

    public function edit_profile(Request $request)
    {
        $driver_id = Auth::guard('sanctum')->user()->id;

        $driver = Driver::find($driver_id);


        if($request->has('name')) {
            $driver->name = $request->name;
        }
        if($request->has('email')) {
            $driver->email = $request->email;
        }
        if($request->has('phone')) {
            $driver->phone = $request->phone;
        }
        if($request->has('gender')) {
            $driver->gender = $request->gender;
        }
        if($request->has('age')) {
            $driver->age = $request->age;
        }
        if($request->has('address')) {
            $driver->address = $request->address;
        }

        if($request->has('city_id')) {
            $driver->city_id = $request->city_id;
        }

        if($request->has('region_id')) {
            $driver->region_id = $request->region_id;
        }

        if($driver->save()){
            return  response()->json(['message' => 'Profile update Successfully' , 'status'=> true]);
        } else {
            return  response()->json(['message' => 'something Wrong !' , 'status'=> false]);
        }
    }

    public function index()
    {
        $driver = Auth::guard('sanctum')->user();
        // return $driver;
        $notification = $driver->unreadNotifications;

        return OrderNotificationResource::collection($notification);
    }

    public function confirm($id)
    {
       try {
        $driver = Driver::find(Auth::guard('sanctum')->user()->id);
        $notification = $driver->unreadNotifications()->find($id);
        $jsonNotify = json_decode($notification);
        $order_id = $jsonNotify->data->order_id;

        $order = Order::find($order_id);

        $order->driver_id =  $driver->id;
        $driver->busy =  Driver::BUSY;
        $order->progress =  2;
        $order->save();
        $driver->save();

        $notification->markAsRead();

        return new OrderResource($order);
    } catch (Exception $exception) {
        logger([
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            ]);
            return response()->json([ 'message' => 'Order already been confirmed or something wrong !' , 'status' => false]);
        }

    }

    public function order()
    {
        try {
        $id = Auth::guard('sanctum')->user()->id;
        $orders = Order::where('driver_id' , $id)->where('progress' , "2")->get();
        return OrderResource::collection($orders);

    } catch (Exception $exception) {
             logger([
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            ]);
          return response()->json([ 'message' => ' something wrong !' , 'status' => false]);
        }
    }


    public function history()
    {
        $driver = Auth::guard('sanctum')->user();
        // return $driver;
        $notification = $driver->readNotifications;

        return OrderNotificationResource::collection($notification);
    }


    public function order_finish()
    {
        $driver_id = Auth::guard('sanctum')->user()->id;
        // return $driver;
        $orders = Order::where(['driver_id' => $driver_id , 'progress' => "5" , 'order_status' => "1"])->get();

        return OrderResource::collection($orders);
    }



    public function filter(Request $request)
    {
        $orders = Order::whereHas('user' , function($query) use ($request){
            $query->where('name' ,'like' , '%'.$request->name.'%');
        });
        return OrderResource::collection($orders->get());
    }


    public function delivered($id)
    {
       try {
        $order = Order::find($id);
        $driver = Driver::find(Auth::guard('sanctum')->user()->id);
        $order->order_status =  Order::DONE;
        $driver->busy = Driver::NOTBUSY;
        $order->progress = "5";
        $driver->save();
        $order->save();

       } catch (Exception $exception) {
            // $this->logErrors($exception);
            return response()->json([ 'message' => 'There is no Order with this ID try another one !' , 'status' => false]);
        }
    }
}

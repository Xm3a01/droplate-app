<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Order;
use App\Models\Product;
use Carbon\CarbonPeriod;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   
    public function index(Request $request)
    {
        $orders = Order::with('orderDetails')->get();

        return OrderResource::collection($orders);
    }

    
    public function store(Request $request)
    {
        // final code for order
        $order = $request->order;
        $order['user_id'] = Auth::guard('sanctum')->user()->id;
        $ordr = Order::create($order);

        foreach ($order['order_details'] as $key => $order_detail) {
            $order_detail['order_id'] = $ordr->id;
            OrderDetail::create($order_detail);
        }

        return response()->json(['message' => 'Order save successfully' , 'status' => true]);

    }

    public function order_done()
    {
       $orders = Order::with('orderDetails')->where('order_status' , Order::DONE)->get();
        return OrderResource::collection($orders);
    }

    public function order_inProgress(){
        $orders = Order::with('orderDetails')->where('order_status' , Order::INPROGRESS)->get();
        return OrderResource::collection($orders);
    }
    public function order_canceled(){
        $orders = Order::with('orderDetails')->where('order_status' , Order::CANCEL)->get();
        return OrderResource::collection($orders);
    }

    public function order_status(Request $request , Order $order)
    {
        $order->update([
            'order_status' => $request->order_status
        ]);

        return response()->json(['message' => 'Order Status set  successfully' , 'status' => true]);
    }
}

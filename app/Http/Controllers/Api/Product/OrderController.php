<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Order;
use App\Models\Product;
use Carbon\CarbonPeriod;
use App\Models\OrderDetail;
use App\Traits\WalletTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
   
    use WalletTrait;

    public function index(Request $request)
    {
        $orders = Order::with('orderDetails')
        ->where('user_id' , Auth::guard('sanctum')->user()->id)->get();

        return OrderResource::collection($orders);
    }

    
    public function store(Request $request)
    {
        // final code for order
        $order = $request->order;
        $user_id = Auth::guard('sanctum')->user()->id;
        $order['user_id'] = $user_id;
        $ordr = Order::create($order);
        foreach ($order['order_details'] as $key => $order_detail) { 
            $ordr->orderDetails()->create($order_detail);
            $product = Product::find($order_detail['product_id']);
            $product->quantity -= $order_detail['quantity'];
            $product->save();
        }

        // $this->order_wallet($user_id , $order->order_status);
        return response()->json(['message' => 'Order save successfully' , 'status' => true]);

    }

    public function order_done()
    {
       $orders = Order::with('orderDetails')->where('order_status' , Order::DONE)->get();
        return OrderResource::collection($orders);
    }

    public function order_inProgress(){
        $orders = Order::with('orderDetails')->where('order_status' , Order::ACTIVE)->get();
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

        if($order->order_status == 1) {
            $user_id = Auth::guard('sanctum')->user()->id;
            $this->order_wallet($user_id , $order->order_status);
        }

        return response()->json(['message' => 'Order Status set  successfully' , 'status' => true]);
    }
}

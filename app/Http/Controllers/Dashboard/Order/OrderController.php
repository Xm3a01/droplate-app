<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('app.order.index');
    }

    public function show(Order $order)
    {
        
        $order->load('orderDetails.product');
        return view('app.order.show' , ['order' => $order]);
        
    }


    public function update(Request $request , Order $order)
    {
        if($request->has('progress')) {
            $order->progress = $request->progress;
        }

        $order->save();
    }

    public function destroy(Order $order)
    {
        $order->delete();
    }
}

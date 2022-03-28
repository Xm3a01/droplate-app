<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('cartDetails.product')
              ->where('user_id' , Auth::guard('sanctum')->user()->id)->get();
        return CartResource::collection($carts);
    }
    public function add(Request $request)
    {
        $cart = DB::transaction(function() use($request){
            $cart = Cart::where('user_id' , Auth::guard('sanctum')->user()->id)->first();
            if(is_null($cart)) {
                $cart = Cart::create([
                    'quantity' => $request->quantity,
                    'total_price' => $request->price,
                    'user_id' => Auth::guard('sanctum')->user()->id
                ]);
            }

            $cartDetail = CartDetail::where('product_id' , $request->product_id)->first();
            if(is_null($cartDetail)) {
                $cart->cartDetails()->create([
                    'quantity' => $request->quantity,
                    'sub_total_price' => ($request->quantity * $request->price),
                    'price' => $request->price,
                    'product_id' => $request->product_id,
                ]);
            } else {
                $cartDetail->quantity += $request->quantity;
                $cartDetail->sub_total_price += ($request->quantity * $request->price);
                $cartDetail->save();
            }

            return $cart;
        });

        return response()->json(['message' => "Product Add To Cart Successfully" , 'status' => true]);
    }

    public function remove($id)
    {
        $cartDetail = CartDetail::where('product_id' , $id)->first();

        $cartDetail->delete();
        return response()->json(['message' => "Product Delete From Cart Successfully" , 'status' => true]);
    }

    public function clear()
    {
        $cart = Cart::where('user_id' , Auth::guard('sanctum')->user()->id)->first();
        $cart->delete();
        return response()->json(['message' => " Cart Clear Successfully" , 'status' => true]);
    }
}

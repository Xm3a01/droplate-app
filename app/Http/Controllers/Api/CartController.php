<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartDetailResource;
use App\Http\Resources\CartResource;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('cartDetails.product')
              ->where('user_id' , Auth::guard('sanctum')->user()->id)->get();
        // return $carts;
        return CartResource::collection($carts);
    }
    public function add(Request $request)
    {
        
        $product = Product::find( $request->product_id);
        if(!is_null($product) && $product->quantity >= $request->quantity) {
         
        $cart = DB::transaction(function() use($request , $product){
            $cart = Cart::where('user_id' , Auth::guard('sanctum')->user()->id)->first();
            if(is_null($cart)) {
                
                $cart = new Cart();
                $cart->quantity = $request->quantity;
                $cart->total_price = $request->quantity > 100
                    ? $product->wholesale_price
                    : $request->price;
                $cart->user_id = Auth::guard('sanctum')->user()->id;
                $cart->save();
            } else {
                
                $cart->quantity += $request->quantity;
                $cart->total_price += $request->quantity > 100
                    ? $request->wholesale_price
                    : $request->price;
                $cart->save();
            }

            
                $cartDetail = CartDetail::where('cart_id' , $cart->id)->where('product_id' , $product->id)->first();
                // dd($cartDetail);
                if(is_null($cartDetail)) {
                    // dd($request);
                    $cartDetails = new CartDetail();
                    $cartDetails->quantity = $request->quantity;
                    $cartDetails->purchasing_price = $request->purchasing_price;
                    $cartDetails->vat = $this->setting()->vat;
                    $cartDetails->wholesale_price = $request->wholesale_price;
                    $cartDetails->discount = $request->discount;
                    $cartDetails->product_id = $request->product_id;
                    $cartDetails->cart_id = $cart->id;
                    $cartDetails->price = $request->quantity > 100
                    ? $request->wholesale_price
                    : $request->price;
                    $cartDetails->save();
                } else {
                    // dd($request);
                    $cartDetail->quantity += $request->quantity;
                    $cartDetail->save();
                }

                // $cartDetails->sub_total_price = $request->quantity > 100
                // ? ($request->quantity * $request->wholesale_price)
                // : ($request->quantity * $request->price);
                
                // $cartDetails->sub_total_purchasing_price = ($request->quantity * $request->purchasing_price);
                // $cartDetails->sub_total_discount = ($request->quantity * $cartDetails->discount);
                // $cartDetails->sub_total_wholesale_price = ($request->quantity * $request->wholesale_price);
                
                
            

// dd($cartDetail);
            return $cart;
        });
        return response()->json(['message' => "Product Add To Cart Successfully" , 'status' => true]);
      }

        return response()->json(['message' => "Product Not Found Or Quantity is not available" , 'status' => false]);
    }

    public function remove($id)
    {
        $cartDetail = CartDetail::where('product_id',$id)->first();

        $cartDetail->delete();
        return response()->json(['message' => "Product Delete From Cart Successfully" , 'status' => true]);
    }

    public function clear()
    {
        $cart = Cart::where('user_id' , Auth::guard('sanctum')->user()->id)->first();
        $cart->delete();
        return response()->json(['message' => " Cart Clear Successfully" , 'status' => true]);
    }

    public function update(Request $request , $id )
    {
        $cart = CartDetail::find($id);
        if(is_null($cart)) {
            return response()->json(['message' => "Not Found" , 'status' => false]);
        } else {
            $cart->quantity += $request->quantity;
            $cart->save();
            return response()->json(['data' => new CartDetailResource($cart)  , 'status' => true]);
        }
    }
}

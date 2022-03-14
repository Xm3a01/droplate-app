<?php

namespace App\Http\Controllers\Api\Favorite;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;

class FavoriteController extends Controller
{

    public function index()
    {
        $products = Product::whereHas('favorites' , function($quary){
            $quary->where('user_id' , Auth::guard('sanctum')->user()->id);
        })->orderBy('created_at')->get();
        return ProductResource::collection($products);
    }
    public function add_to_favorite(Product $product)
    {
        if(!$product->favorites()->isFavorite()) {
            $product->favorites()->create([
                'user_id' => Auth::guard('sanctum')->user()->id
            ]);
       } else{
         $product->favorites()->delete();
         return  response()->json(['message' => 'Un Favorite' , 'status'=> true]);
       }

        return  response()->json(['message' => 'Favorite add Successfully' , 'status'=> true]);
    }
}

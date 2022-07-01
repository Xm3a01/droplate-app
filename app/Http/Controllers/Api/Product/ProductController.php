<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductDetailsResource;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::where('quantity' , '>' , 0)->orderBy('created_at')->take(10)->get();
        $products->load('category' , 'subCategory' , 'reviews','favorites');
        if(!is_null($products)) {
            return  ProductResource::collection($products);
        } else {
            return response()->json(['message' => 'No Products Found' , 'status' => true]);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        if(!is_null($product)) {
           $product->with(['category' , 'subCategory' , 'reviews','favorites']);
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'No product found' , 'status' => false]);
        }
    }

    public function filter(Request $request)
    {


        $query = Product::with(['category' , 'subCategory' , 'reviews','favorites']);
        $products = $query->where('category_id' , $request->category_id)
                    ->where('name->en','LIKE', "%{$request->name}%")
                    ->orWhere('name->ar', 'LIKE', "%{$request->name}%")->get();

        return ProductResource::collection($products);
    }

    public function new()
    {
        $products = Product::where('quantity' , '>' , 0)->orderBy('created_at')->take(10)->get();
        return  ProductResource::collection($products);
    }
}

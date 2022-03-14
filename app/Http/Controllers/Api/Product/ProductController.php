<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

// use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::where('quantity' , '>' , 0)->orderBy('created_at')->take(10)->get();
        $products->load('category' , 'subCategory' , 'reviews','favorites');
        return  ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->with(['category' , 'subCategory' , 'reviews','favorites']);
        return new ProductResource($product);
    }

    public function filter(Request $request)
    {

        // return $request;
        $query = Product::with(['category' , 'subCategory' , 'reviews','favorites']);
        // $query->where('category_id' , $request->category_id);
        // $query->where('sub_category_id' , $request->sub_category_id);

        $products = $query->where('category_id' , $request->category_id)
                     ->where('name->en' , $request->name)
                     ->orWhere('name->ar' , $request->name)->get();

        return ProductResource::collection($products);
    }

    public function new()
    {
        $products = Product::where('quantity' , '>' , 0)->orderBy('created_at')->take(10)->get();
        // $products->load('category' , 'subCategory' , 'reviews','favorites');
        return  ProductResource::collection($products);
    }
}

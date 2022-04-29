<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('permission:product');
    }
    public function index()
    {

        $categories = Category::all();
        $categories->load("subCategories");
        // return $categories;
        return view('app.product.index' , ['categories' => json_encode($categories)]);
    }

   
    public function create()
    {
        $categories = Category::with('subCategories')->get();
        return view('app.product.create' , ['categories' => json_encode($categories)]);
    }

   
    public function store(ProductRequest $request)
    {
        $request['name'] = [
            'ar' => $request->ar_name,
            'en' => $request->en_name,
        ];
        $request['descripton'] = [
            'ar' => $request->ar_description,
            'en' => $request->en_description,
        ];

        // return $request;
        $product = Product::create($request->except('images'));
        if($request->hasFile('images')) {
            $fileAdders = $product->addMultipleMediaFromRequest(['images'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('products');
            });
            // $product->addMedia($request->file('image'))->toMediaCollection('products');
        }

        Session::flash('success' , 'Product Add Successfully');
        return redirect()->route('products.index');
    }

   
    public function show(Product $product)
    {
        return view('app.product.show',['product' => $product]);
    }

   
    public function edit(Product $product)
    { 
        $categories = Category::all();
        $sub_categories = SubCategory::all();

        return view('app.product.edit',[
            'product' => $product,
            'categories' => json_encode($categories),
            'sub_categories' => json_encode($sub_categories)
        ]);
    }

    
    public function update(Request $request,  $id)
    {
        // dd($request);
        $product = Product::findOrFail($id);
        $request['name'] = [
            'ar' => $request->ar_name,
            'en' => $request->en_name,
        ];
        $request['descripton'] = [
            'ar' => $request->ar_description,
            'en' => $request->en_description,
        ];

         $product->update($request->except('image'));
        if($request->hasFile('image')) {
            // $product->clearMediaCollection('image');
            // $fileAdders = $product->addMultipleMediaFromRequest(['images'])
            // ->each(function ($fileAdder) {
            //     $fileAdder->toMediaCollection('products');
            // });
            $product->addMedia($request->file('image'))->toMediaCollection('products');
        }

        Session::flash('success' , 'Product update Successfully');
        return redirect()->route('products.index');
    }

   
    public function destroy(Product $product)
    {
        // dd( $product);
        if($product->images) {
            $product->clearMediaCollection('products');
        }
        $product->delete();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandsResource;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        $category->with('products');
        return new BrandsResource($category);
    }

    public function filter(Request $request)
    {

        $category = Category::with('subCategories')->where('name->ar' , $request->name)
           ->orWhere('name->en' , $request->name )->first();

        if(!is_null($category)) {
            return new CategoryResource($category);
        } else {
            return [];
        }
    }

    public function brand()
    {
        $categories = Category::with('products')->take(2)->get();
        return BrandsResource::collection($categories);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        $category->with('subCategories');
        return new CategoryResource($category);
    }

    public function filter(Request $request)
    {
        $categories = Category::with('subCategories')->whereJsonContains('name->en' , $request->name)
                 ->orWhereJsonContains('name->en' , $request->name)->get();

        return CategoryResource::collection($categories);
    }
}

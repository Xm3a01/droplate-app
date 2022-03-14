<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::with('products')->get();
        return SubCategoryResource::collection($sub_categories);
    }
    public function show(SubCategory $subCategory)
    {
        $subCategory->with('products');
        return new SubCategoryResource($subCategory);
    }

    public function filter(Request $request)
    {
        $sub_categories = SubCategory::with('products')->whereJsonContains('name->en' , $request->name)
                 ->orWhereJsonContains('name->en' , $request->name)->get();

        return SubCategoryResource::collection($sub_categories);
    }
}

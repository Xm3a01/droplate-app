<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ImageResource;
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
        $sub_category = SubCategory::with('products')->where('name->ar' , $request->name)
        ->orWhere('name->en' , $request->name )->first();
        if(!is_null($sub_category)) {
        return new SubCategoryResource($sub_category);
        } else {
            return [];
        }
    }


    public function bestBrand()
    {
        $brands = SubCategory::latest()->take(10)->get();

        return BrandResource::collection($brands);
    }
}

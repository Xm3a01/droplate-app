<?php

namespace App\Http\Controllers\Dashboard\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('app.subcategory.index', ['categories' => $categories]);
    }


    public function create()
    {
        //
    }


    public function store(SubCategoryRequest $request)
    {
        $sub = SubCategory::create([
            'name' => [
                'ar' => $request->ar_name,
                'en' => $request->name,
            ],
            'category_id' => $request->category_id
        ]);
        if ($request->hasFile('image')) {
            $sub->addMedia($request->image)->toMediaCollection('subCategories');
        }

        Session::flash('success', 'Sub Category add Successfuly');
        return redirect()->route('sub_categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(SubCategory $sub_category)
    {
        $sub_category->load('category');
        $sub_category['ar_name'] = $sub_category->getTranslation('name' , 'ar');
        $sub_category['name'] = $sub_category->getTranslation('name' , 'en');
        $categories = Category::all();

        return view('app.subcategory.edit', [
            'sub' => $sub_category,
            'categories' => $categories
        ]);
    }

    public function update(SubCategoryRequest $request, SubCategory $sub_category)
    {
        if ($request->hasFile('image')) {
            $sub_category->addMedia($request->image)
                ->toMediaCollection('subCategories');
        }

        if($request->has('ar_name') && $request->has('name')) {
        $sub_category->update([
            'name' => [
                'ar' => $request->ar_name,
                'en' => $request->name,
            ],
        ]);
       }

        if($request->has('category_id')) {
            $sub_category->category_id = $request->category_id;
            $sub_category->save();
        }


        Session::flash('success', 'Sub Category update Successfuly');
        return redirect()->route('sub_categories.index');
    }

    public function destroy(SubCategory $sub_category)
    {
        if ($sub_category->image) {
            $sub_category->clearMediaCollection('subCategories');
        }

        $sub_category->delete();
    }
}

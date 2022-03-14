<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('app.category.index');
    }

  
    public function create()
    {
        return view('app.category.create');
    }

  
    public function store(CategoryRequest $request)
    {
        Category::create([
        'name' => [
            'ar' => $request->ar_name,
            'en' => $request->name,
        ]
      ]);

      Session::flash('success' , 'Category add successfuly');
      return redirect()->route('categories.index');
    }
    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        $category['en'] = $category->getTranslation('name' , 'en');
        $category['ar'] = $category->getTranslation('name' , 'ar');
        // dd($category);
        return view('app.category.edit' , ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
           'name' => [
               'ar' => $request->ar_name,
               'en' => $request->name
           ] 
       ]);

       Session::flash('success' , 'Category update successfuly');
      return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success' , 'Category delete successfuly');
       return redirect()->route('categories.index');
    }
}

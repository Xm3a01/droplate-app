<?php

namespace App\Http\Controllers\Dashboard\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    
    public function index()
    {
        return view('app.city.index');
    }

    
    public function store(Request $request)
    {
        $this->validate($request , [
            'regular_delivery_price' => 'numeric',
            'fast_delivery_price' => 'numeric'
        ]);
        City::create([
            'name' => [
                'ar' => $request->city_ar_name,
                'en' => $request->city_en_name,
                 ],
            'regular_delivery_price' => $request->regular_delivery_price,
            'fast_delivery_price' => $request->fast_delivery_price,
        ]);

        Session::flash('success' , 'City Add Successfylly');
        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        $regions = Region::all();

        return view('app.city.edit' , ['regions' => $regions , 'city' => $city]);
    }

   
    public function update(Request $request, City $city)
    {

        // return  $request->city_ar_name;
        $city->update([
            'name' => [
                'ar' => $request->city_ar_name,
                'en' => $request->city_en_name
            ],
            'regular_delivery_price' => $request->regular_delivery_price,
            'fast_delivery_price' => $request->fast_delivery_price,
        ]);

        Session::flash('success' , 'City update Successfylly');
        return redirect()->route('cities.index');
    }

   
    public function destroy(City $city)
    {
        $city->delete();
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Region;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
   
    public function index()
    {
        $cities = City::all();
        return view('app.region.index' , [
            'cities' => $cities
        ]);
    }

  
    public function store(Request $request)
    {
        Region::create([
            'name' => [
                'ar' => $request->ar_name,
                'en' => $request->en_name
            ],
            'regular_delivery_price' => $request->regular_delivery_price,
            'fast_delivery_price' => $request->fast_delivery_price,
            'city_id' => $request->city_id
        ]);

        Session::flash('success' , 'Region Add Successfylly');
        return redirect()->route('regions.index');

        
    }
    
    public function edit(Region $region)
    {
        $cities = City::all();
        return view('app.region.edit' , [
            'region' => $region,
            'cities' => $cities

        ]);
    }

    public function update(Request $request, Region $region)
    {
         $region->update([
            'name' => [
                'ar' => $request->ar_name,
                'en' => $request->en_name,
                 ],
            'regular_delivery_price' => $request->regular_delivery_price,
            'fast_delivery_price' => $request->fast_delivery_price,
            'city_id' => $request->city_id
        ]);

        Session::flash('success' , 'Region update Successfylly');
        return redirect()->route('regions.index');
    }

   
    public function destroy(Region $region)
    {
        $region->delete();
    }
}

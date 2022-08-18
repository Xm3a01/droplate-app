<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities  = City::with('regions')->get();

        return CityResource::collection($cities);
    }


    public function show(City $city)
    {
        $city->with('regions')->get();
        return new CityResource($city);
    }

    public function filter(Request $request)
    {
        $city = City::with('regions')->where('name->ar' , $request->name)
        ->orWhere('name->en' , $request->name )->first();
        if(!is_null($city)) {
            return new CityResource($city);
        } else {
            return [];
        }
    }
}

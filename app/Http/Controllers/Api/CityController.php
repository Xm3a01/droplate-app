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
        $cities  = City::with('region')->get();
        return CityResource::collection($cities);
    }


    public function show(City $city)
    {
        $city->with('region')->get();
        return new CityResource($city);
    }

    public function filter(Request $request)
    {
        $cities = City::with('region')->whereJsonContains('name->en' , $request->name)
                 ->orWhereJsonContains('name->en' , $request->name)->get();

        return CityResource::collection($cities);
    }
}

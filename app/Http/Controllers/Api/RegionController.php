<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions  = Region::with('cities')->get();
        return RegionResource::collection($regions);
    }


    public function show(Region $region)
    {
        $region->with('cities')->get();
        return new RegionResource($region);
    } 


    public function filter(Request $request)
    {
        $regions = Region::with('cities')->whereJsonContains('name->en' , $request->name)
                 ->orWhereJsonContains('name->en' , $request->name)->get();

        return RegionResource::collection($regions);
    }
}

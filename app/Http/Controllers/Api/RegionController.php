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
        $regions  = Region::with('city')->get();
        return RegionResource::collection($regions);
    }


    public function show(Region $region)
    {
        $region->with('city')->get();
        return new RegionResource($region);
    } 


    public function filter(Request $request)
    {
        $region = Region::with('city')->find($request->id);
        // $region->load('city');
        if(!is_null($region)) {
            return new RegionResource($region);
        } else {
            return [];
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Ads;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Resources\AdsResource;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::first();
        
        if(!is_null($ads)){
            return new AdsResource($ads);
        } else {
            return response()->json(['message' => 'There is no Ads' , 'status' => false]);
        }
    }
}

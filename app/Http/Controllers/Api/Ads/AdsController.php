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
        return new AdsResource(Ads::first());
    }
}

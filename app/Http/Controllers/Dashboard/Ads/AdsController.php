<?php

namespace App\Http\Controllers\Dashboard\Ads;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdsController extends Controller
{
   
    public function index()
    {
        $ads = Ads::first();
        return view('app.ads.index' , ['ads' => $ads]);
    }

    
    public function store(Request $request)
    {
        $ad = Ads::first();
        if(is_null($ad)) {
          $ad = Ads::create(['name' => $request->name]);
        } 
            // dd('to');
        if($request->hasFile('images')) {
            $ad->clearMediaCollection('ads');
            // dd($ad->images);
            $fileAdders = $ad->addMultipleMediaFromRequest(['images'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('ads');
            });
        }

        Session::flash('success' , 'Ads Add Successfully');
        return redirect()->route('ads.index');
    }
}

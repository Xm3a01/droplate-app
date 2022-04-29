<?php

namespace App\Http\Controllers\Dashboard\Ads;

use App\Models\Ads;
use App\Traits\MediaTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    use MediaTrait;
   
    public function index()
    {
        $en_ads = Ads::select('link' , 'image' , 'id')
        ->whereNotNull('image')->get();
        $ar_ads = Ads::select('ar_link' , 'ar_image' , 'id')
        ->whereNotNull('ar_image')->get();
        return view('app.ads.index' , [
            'en_ads' => $en_ads,
            'ar_ads' => $ar_ads,
        ]);
    }

    
    public function store(Request $request)
    {
        $ads = new Ads();
        if($request->hasFile('image')) {
            $ads->image = $this->getTraitMediaUrl($request->image);
        }

        if($request->hasFile('ar_image')) {
            $ads->ar_image = $this->getTraitMediaUrl($request->ar_image);
        }

        $ads->link = $request->link;
        $ads->ar_link = $request->ar_link;

        $ads->save();

        Session::flash('success' , 'Ads Add Successfully');
        return redirect()->route('ads.index');
    }

    public function update(Request $request , $id)
    {

        $ads = Ads::findOrFail($id);
        if($request->has('ar_image')){
            Storage::delete($ads->ar_image);
            $ads->ar_image = $this->getTraitMediaUrl($request->ar_image);
        }

        if($request->has('ar_link')){
            $ads->ar_link = $request->ar_link;
        }

        if($request->has('image')){
            Storage::delete($ads->image);
            $ads->image = $this->getTraitMediaUrl($request->image);
        }

        if($request->has('link')){
            $ads->link = $request->link;
        }

        $ads->save();

        Session::flash('success' , 'Ads Update Successfully');
        return redirect()->route('ads.index');

    }

    public function destroy(Request $request  ,$id)
    {

        $ads = Ads::findOrFail($id);

        if($request->lang == 'en') {
            if($ads->image){
                Storage::delete($ads->image);
            }
            $ads->link = null;
            $ads->image = null;
            $ads->save();
        } else {
            if($ads->ar_image){
                Storage::delete($ads->ar_image);
            }
            $ads->ar_link = null; 
            $ads->ar_image = null; 
            $ads->save();
        }

        
        Ads::where('id' , $id)->whereNull('image')->whereNull('link')
            ->whereNull('ar_image')->whereNull('ar_link')->delete();
        Session::flash('success' , 'Ads Delete Successfully');
        return redirect()->route('ads.index');
    }
}

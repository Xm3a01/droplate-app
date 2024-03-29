<?php

namespace App\Http\Controllers\Api\PromoCode;

use Carbon\Carbon;
use App\Models\PromCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    public function getPromo(Request $request)
    {
        // return Carbon::now()->format('m-d-Y');
        $promo = PromCode::where('code' , $request->promoCode)
        ->whereDate('end_date' , '>=' , Carbon::now())->first();
        if($promo) {
            if($promo->user_id != Auth::guard('sanctum')->user()->id){
                $promo->user_id = Auth::guard('sanctum')->user()->id;
                $promo->save();
              return response()->json(['value' => (float)$promo->price , 'promoType' => $promo->promoType  ,  'status' => true]);
            } else {
              return  response()->json(['message' => 'Promo Code Allready used' , 'status' => false]);
            }

        } else {
            return  response()->json(['message' => 'Promo Code Expire' , 'status' => false]);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Otp;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function generate(Request $request)
    {

        $user = User::where('phone', $request->phone)->first();
        if(!$user) {
            $otp = Otp::generate($request->phone, 6, 1000);
    
            if($otp->status == true) {
                $text = "Your Otp code is : " .$otp->token; // do message 
            } 
            return $otp;

        } else {
            return response()->json(['message' => 'This phone number allready exsist' , 'status' => false]);
        }
        
    }

    public function check(Request $request)
    {
        $otp = Otp::validate($request->phone , $request->token);
        return $otp;

    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Helper\Sms;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::guard('sanctum')->user()->id);
        return new UserResource($user);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::guard('sanctum')->user()->id);

        if($request->has('name')) {
            $user->name = $request->name;
        }
        if($request->has('email')) {
            $user->email = $request->email;
        }
        if($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if($request->has('gender')) {
            $user->gender = $request->gender;
        }
        if($request->has('age')) {
            $user->age = $request->age;
        }
        if($request->has('address')) {
            $user->address = $request->address;
        }
        if($request->has('image') && $request->image !='') {
           $user->clearMediaCollection('users');
           $user->addMedia($request->image)->toMediaCollection('users');
        }

        if($user->save()){
            return  response()->json(['message' => 'Profile update Successfully' , 'status'=> true]);
        } else {
            return  response()->json(['message' => 'something Wrong !' , 'status'=> false]);
        }
    }

    public function change_password(Request $request , User $user)
    {
        // return Hash::check($request->old_password, $user->password);
        if($request->has('new_password')) {
            if(Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            }
         }

         if($user->save()){
            return  response()->json(['message' => 'Password update Successfully' , 'status'=> true]);
        } else {
            return  response()->json(['message' => 'something Wrong !' , 'status'=> false]);
        }
    }

    public function reset_password(Request $request)
    {
        $user  = User::where('phone' , $request->phone)->first();
        if($user) {
            $otp = Otp::generate($request->phone, 4, 1);

            if($otp->status == true) {
                // Session
                $text = "Your Otp code is : " .$otp->code; // do message 
                Sms::send($text , $user->phone);
            } 

            return $otp;
        } else {
            return  response()->json(['message' => 'User is not register in this app!' , 'status'=> false]);
        }
    }

    public function reset_password_otp_check(Request $request)
    {
        // return
        $otp = Otp::validate($request->phone , $request->code);
        return $otp;
    }

    public function new_password(Request $request)
    {
        // return $request;
        $this->validate($request , [
            'password' => 'required|min:8|confirmed'
        ]);
        $user  = User::where('phone' , $request->phone)->first();
        if(!is_null($user)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return  response()->json(['message' => 'Password set Successfully' , 'status'=> true]);

        } else {
            return  response()->json(['message' => 'You dont Have Accounte' , 'status'=> false]);

        }
    }
}



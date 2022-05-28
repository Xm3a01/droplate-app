<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SocialAuthController extends Controller
{


    public function __construct()
    {
        // $this->middleware('guest:sanctum')->except('logout');
    }


    public function login(Request $request)
    {

        // return $request->password;
        $request->validate([
           'social_id' => 'required',
        ]);
     
        $user = User::where('social_id', $request->social_id)->first();
     
        // return !Hash::check($request->password , $user->password);
        if ($user->social_id != $request->social_id) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect or user blocked.'],
            ]);
        }
     
        return response()->json([ 
            'user' => $user , 
            'token' => $user->createToken('My-token')->plainTextToken , 
            'status' => true
        ]);
    }

    public function apiLogout()
    {
        // return request()->user();
        $user = request()->user();
        // Auth::gaurd('api')->logout();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

       return response()->json(['status' => true , 'message' => 'logout Successfully']);
    }

    protected function create(Request $request)
    {

        // return $request;
        $this->validate($request , [
            'social_id' => 'required',
        ]);
        $user =  User::create([
            'social_id' => $request->social_id,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return response()->json([ 
            'user' => $user, 
            'token' => $user->createToken('My-token')->plainTextToken , 
            'status' => true
        ]);
    }


}

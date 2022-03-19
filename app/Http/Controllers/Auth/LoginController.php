<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;


    public function __construct()
    {
        // $this->middleware('guest:sanctum')->except('logout');
    }


    public function login(Request $request)
    {

        // return $request->password;
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
            // 'device_name' => 'required',
        ]);
     
        $user = User::where('phone', $request->phone)->first();
     
        // return !Hash::check($request->password , $user->password);
        if (!$user || ! Hash::check($request->password, $user->password)) {
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


   

}

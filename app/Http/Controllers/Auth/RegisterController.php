<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function generate(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if(!$user) {
            $otp = Otp::generate($request->phone, 4, 1);
    
            if($otp->status == true) {
                $text = "Your Otp code is : " .$otp->code; // do message 
            } 
            return $otp;

        } else {
            return response()->json(['message' => 'This phone number allready exsist' , 'status' => false]);
        }
    }


    public function check(Request $request)
    {
        $otp = Otp::validate($request->phone , $request->code);
        return $otp;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {

        // return $request;
        $this->validate($request , [
            // 'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user =  User::create([
            // 'name' => $request->name,
            'phone' => $request->phone,
            // 'email' => $request->email,
            // 'age' => $request->age,
            // 'gender' => $request->gender,
            // 'address' => $request->address,
            'password' => Hash::make($request->password),
            

        ]);

        return response()->json([ 
            'user' => $user, 
            'token' => $user->createToken('My-token')->plainTextToken , 
            'status' => true
        ]);
    }
}

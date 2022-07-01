<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DriverAuthController extends Controller
{
    protected function create(Request $request)
    {

        // return $request;
        $this->validate($request , [
            // 'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'string', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $driver =  Admin::create([
            // 'id' => $request->name,
            'name' => 'Driver',
            'phone' => $request->phone,
            // 'email' => 'fak@app.com',
            // 'age' => $request->age,
            // 'gender' => $request->gender,
            // 'address' => $request->address,
            'password' => Hash::make($request->password),
            

        ]);

        $driver->assignRole('Driver');

        return response()->json([ 
            'driver' => $driver, 
            'token' => $driver->createToken('My-token')->plainTextToken , 
            'status' => true
        ]);
    }

    public function login(Request $request)
    {

        // return $request->password;
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
            // 'device_name' => 'required',
        ]);
     
        $user = Admin::where('phone', $request->phone)->first();
     
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

    public function DriverLogout()
    {
        // return request()->user();
        $user = request()->user();
        // Auth::gaurd('api')->logout();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

       return response()->json(['status' => true , 'message' => 'logout Successfully']);
    }

}

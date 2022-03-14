<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Models\City;
use App\Models\Admin;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function edit(Admin $user)
    {
        $regions = Region::all();
        $cities = City::all();
        return view('app.profile.profile' , [
            'user' => $user,
            'regions' => $regions,
            'cities' => $cities,
        ]);
    }

    public function update(Request $request , Admin $user)
    {
        if($request->has('password')) {
            $request['password'] = Hash::make($request->password);
        }
        $user->update($request->all());
        Session::flash('success' , 'Profile Update Successfully');
        return redirect()->back();
    }
}

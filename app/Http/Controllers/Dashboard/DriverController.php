<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    public function index()
    {
        $cities = City::with('regions')->get();
       
        return view('app.driver.index' , [
            'cities' => json_encode($cities),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'phone' => 'required|unique:admins'
        ]);
        $deiver = Admin::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id
        ]);

        $deiver->assignRole('Driver');

        Session::flash('Employee Add Successfylly');
        return redirect()->route('drivers.index');
    }
}

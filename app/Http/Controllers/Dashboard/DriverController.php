<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Admin;
use App\Models\Region;
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

        Session::flash('Driver Add Successfylly');
        return redirect()->route('drivers.index');
    }

    public function edit(Admin $driver)
    {
        $cities = City::all();
        $regions = Region::all();
        return view('app.driver.edit' , [
            'driver' => $driver,
            'cities' => $cities,
            'regions' => $regions,
        ]);
    }
    
    public function update(Request $request , Admin $driver)
    {
        if($request->has("password") && $request->password != "") {
           $request['password'] = Hash::make($request->password);
           $data = $request->all();
        } else {
            $data = $request->except('password');
        }
        
        $driver->update($data);
        
        
        Session::flash('Driver  update Successfylly');
        return redirect()->route('drivers.index');
    }
}

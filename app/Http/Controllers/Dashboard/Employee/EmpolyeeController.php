<?php

namespace App\Http\Controllers\Dashboard\Employee;

use App\Models\City;
use App\Models\Admin;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class EmpolyeeController extends Controller
{
   
    public function index()
    {

        // dd(Http::get('http://hash.m3awork.sd/api/free/products')->products);
        // dd(Admin::role('Employee')->get());
        $regions = Region::with('cities')->get();
        $permissions = Permission::all();

        
        return view('app.employee.index' ,[
            'regions' => json_encode($regions),
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $permission = Permission::where('id' , $request->permission_id)->first();

        $employee = Admin::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id
        ]);

        $employee->assignRole('Employee');
        $employee->givePermissionTo($request->permission);

        Session::flash('Employee Add Successfylly');
        return redirect()->route('employees.index');
        
    }

  
   
    public function edit(Admin $employee)
    {
        $regions = Region::all();
        $cities = City::all();
        $permissions = Permission::all();
        // return $permissions;
        return view('app.employee.edit',[
            'regions' => $regions,
            'cities' => $cities,
            'permissions' => $permissions,
            'employee' => $employee
        ]);
    } 

   
    public function update(Request $request, Admin $employee)
    {
        if($request->has('name')) {
            $employee->name = $request->name;
        }
        if($request->has('phone')) {
            $employee->phone = $request->phone;
        }
        if($request->email != '') {
            $employee->email = $request->email;
        }
        if($request->has('password')) {
            $employee->password = Hash::make($request->password);
        }
        if($request->has('address')) {
            $employee->address = $request->address;
        }
        if($request->has('city_id')) {
            $employee->city_id = $request->city_id;
        }
        if($request->has('region_id')) {
            $employee->region_id = $request->region_id;
        }

        if($request->has('permission_id')) {
            $permission = Permission::where('id' , $request->permission_id)->first();
            $employee->givePermissionTo($permission);
          }

        $employee->save();
        Session::flash('Employee update Successfylly');
        return redirect()->route('employees.index');  
    }

    public function destroy(Admin $employee)
    {
        $employee->delete();
    }
}

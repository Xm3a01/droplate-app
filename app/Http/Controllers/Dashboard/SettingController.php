<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Support\Facades\Session;
// use Illuminate\Contracts\Session\Session;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('app.setting.index' , ['setting' => $setting]);
       
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($request->all());
        Session::flash('success' , 'Setting Update successfully'); 
        return redirect()->route('setting.index');
    }

    public function condition()
    {
        $condition = Condition::first();
       
        return view('app.setting.condition' , ['condition' => $condition]);
    }

    public function condition_store(Request $request)
    {
       $condition = Condition::first();
       if(!is_null($condition)) {
           $condition->update($request->all());
       } else {
           Condition::create($request->all());
       }
       Session::flash('success' , 'Condition add successfully'); 
       return back();
    }
}

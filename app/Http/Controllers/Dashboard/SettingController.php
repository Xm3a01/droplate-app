<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}

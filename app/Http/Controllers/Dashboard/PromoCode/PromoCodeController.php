<?php

namespace App\Http\Controllers\Dashboard\PromoCode;

use App\Helper\Sms;
use Carbon\Carbon;
use App\Models\PromCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Mobile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class PromoCodeController extends Controller
{
   
    public function index()
    {
        // $pro = PromCode::find(2);
        // dd($pro->start_date == $pro->end_date);
        return view('app.promocode.index');
    }

   
    public function create()
    {
    }

    
    public function store(Request $request)
    {
        $promo = PromCode::create([
            'code' => $request->code,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        Notification::send(User::all(), new Mobile($promo->code));
        $users = User::whereNotNull('phone')->pluck('phone');

        // return $users;
        foreach($users as $user) {
            Sms::send('promo code is : $promo->code' , $user);
        }
        Session::flash('success' , 'Promo code Add Successfully');
        return redirect()->route('promoes.index');
    }


    public function edit(PromCode $promo)
    {
        return view('app.promocode.edit' , ['promo' => $promo]);
    }

    public function update(Request $request, PromCode $promo)
    {
        $promo->update([
            // 'code' => $request->price.'|'.Str::random(3),
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        Notification::send(User::all(), new Mobile($promo->code));
        Session::flash('success' , 'Promo code update Successfully');
        return redirect()->route('promoes.index');
    }

    public function destroy(PromCode $promo)
    {
        $promo->delete();
    }
}

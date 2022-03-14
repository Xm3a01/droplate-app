<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
 
    public function index()
    {
        // return User::latest()->first()->image;
        return view('app.user.index');
    }
    public function store(UserRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->except('image'));

        if($request->hasFile('image')) {
            $user->addMedia($request->file('image'))->toMediaCollection('users');
        }  

        Session::flash('success' , 'Client Add Successfully');
        return redirect()->route('users.index');
    }

   
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
       return view('app.user.edit' , ['user' => $user]); 
    }

  
    public function update(Request $request, User $user)
    {

        // return 'hi';
        if($request->has('name')){
            $user->name = $request->name;
        }
        if($request->has('email')){
            $user->email = $request->email;
        }
        if($request->has('phone')){
            $user->phone = $request->phone;
        }
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }
        if($request->has('age')){
            $user->age = $request->age;
        }
        if($request->has('gender')){
            $user->gender = $request->gender;
        }
        if($request->has('address')){
            $user->address = $request->address;
        }
        if($request->hasFile('image')){
            $user->clearMediaCollection('users');
            $user->addMedia($request->file('image'))->toMediaCollection('users');

        }

        $user->save();
        Session::flash('success' , 'Client Update Successfully');
        return redirect()->route('users.index');
    }

   
    public function destroy(User $user)
    {
        $user->clearMediaCollection('users');
        $user->delete();

    }

    public function block(User $user)
    {
        if($user->is_block == 0) {
            $user->is_block = 1;
            $msg = 'You un block this user';
        } else {
            $user->is_block = 0;
            $msg = 'You block this user';  
        }

        $user->save();

        return $msg;
    }
}

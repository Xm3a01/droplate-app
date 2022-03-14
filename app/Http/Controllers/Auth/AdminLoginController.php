<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function AdminLoginForm()
    {
        return view('auth.login');
    }
    public function AdminLogin(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credential, $request->filled('remember'))) {
            return redirect()->route('home');
        } else {
            throw ValidationException::withMessages([
                'email' => 'invalid email or password'
            ]);
        }
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.form'));
    }
}

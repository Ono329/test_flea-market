<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();


        if (!Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }


        if (!Auth::user()->is_profile_set) {
            return redirect()->route('profile.edit');
        }

            return redirect()->route('products.index');
    }

        return back()->withErrors([
        'login' => 'ログイン情報が登録されていません',
        ])->withInput();

    }

    public function logout(Request $request)
    {
        Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

        return redirect('/login');
    }

}


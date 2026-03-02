<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
// ai
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {   
        // ai emailとpassだけ取り出す
        $credentials = $request->only('email', 'password');

        // 認証
        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // 初回ログイン判定
        if (!Auth::user()->is_profile_set) {
            return redirect()->route('profile.edit');
        }
        // 2回目以降は商品一覧画面へ
            return redirect()->route('products.index');
    }
    
    // 認証失敗
        return back()->withErrors([
        'login' => 'ログイン情報が登録されていません',
        ])->withInput();
  
    }

    public function logout(Request $request)
    {
        Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

        return redirect('/login'); // ← ログイン画面へ
    }
    // ai
}


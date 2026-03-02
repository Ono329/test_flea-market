<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ai
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;




class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function store(ProfileRequest $request)
    {
        // ログイン中のユーザーを取得m,k
        $user = Auth::user();


        // プロフィール更新
        $user->name = $request->name;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;

        // 初回設定完了フラグ
        $user->is_profile_set = true; 

        $user->save();

        // 商品一覧へ
        return redirect()->route('products.index');
    }
}



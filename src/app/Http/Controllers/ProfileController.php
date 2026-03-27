<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ai
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Purchase;
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

    public function editAddress(Request $request)
    {
        $product_id = $request->product_id;

        return view('address.edit', compact('product_id'));
    }

    public function updateAddress(Request $request)
    {
        session([
        'purchase_postal_code' => $request->postal_code,
        'purchase_address' => $request->address,
        'purchase_building' => $request->building,
        ]);

        return redirect()->route('purchase.show', ['product' => $request->product_id]);
    }

    public function mypage(Request $request)
    {
        $user = Auth::user();
        $page = $request->query('page', 'sell');

        $sellProducts = Product::where('user_id', $user->id)->get();

        $buyProducts = Purchase::with('product')
        ->where('user_id', $user->id)
        ->get();

        return view('mypage.index', compact('user', 'sellProducts', 'buyProducts', 'page'));
    }
}



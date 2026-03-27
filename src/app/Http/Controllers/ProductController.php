<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if (auth()->check()) {
        $query->where(function ($q) {
            $q->whereNull('user_id') // シーダー商品は表示
              ->orWhere('user_id', '!=', auth()->id()); // 自分以外の出品商品
        });
    }

        if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['comments.user','likes']); // コメントとユーザー取得
    
        return view('products.show', compact('product'));
    }

    public function mylist(Request $request)
    {
        $query = Product::whereHas('likes', function ($q) {
            $q->where('user_id', Auth::id());
    });

    if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    $products = $query->get();

    return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('products','public');
        
        Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'description' => $request->description,
            'category' => json_encode($request->category),
            'condition' => $request->condition,
            'img_url' => $path,
        ]);


        // return view('products.index', compact('products'));
        return redirect()->route('products.index');
    }

}

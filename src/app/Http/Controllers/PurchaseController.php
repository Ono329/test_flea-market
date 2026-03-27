<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;


class PurchaseController extends Controller
{
    public function show(Product $product)
    {
        return view('purchase.show', compact('product'));
    }

    public function store(Request $request, Product $product)
    {

        $request->validate([
        'payment_method' => 'required',
    ]);

        if($product->sold){
            return redirect()->route('products.index');
        }

        Purchase::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'postal_code' => session('purchase_postal_code', auth()->user()->postal_code),
            'address' => session('purchase_address', auth()->user()->address),
            'building' => session('purchase_building', auth()->user()->building),
        ]);

        $product->sold = true;
        $product->save();

        session()->forget([
            'purchase_postal_code',
            'purchase_address',
            'purchase_building',
        ]);


        return redirect()->route('products.index');
    }
}

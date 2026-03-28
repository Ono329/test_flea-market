<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle($product_id)
{
    $favorite = Favorite::where('user_id', auth()->id())
        ->where('product_id', $product_id)
        ->first();

    if ($favorite) {
        $favorite->delete();
    } else {
        Favorite::create([
            'user_id' => auth()->id(),
            'product_id' => $product_id
        ]);
    }

    return back();
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($product_id)
    {
        if (!Auth::check()) {
        return redirect()->route('login');
        }

        $like = Like::where('user_id', Auth::id())
                    ->where('product_id', $product_id)
                    ->first();

        if ($like) {

            $like->delete();
        } else {

            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id
            ]);
        }

        return back();
    }
}

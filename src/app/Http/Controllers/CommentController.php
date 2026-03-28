<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
{

    if (!auth()->check()) {
        return redirect()->route('login');
    }

    Comment::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'content' => $request->content
    ]);

    return back();
}
}

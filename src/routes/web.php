<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

// 会員登録
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// ログイン画面
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ログイン必須のページ
Route::middleware('auth')->group(function () {

    // プロフィール設定画面
    Route::get('/mypage/profile', [ProfileController::class, 'index'])->name('profile.edit');
    Route::post('/mypage/profile', [ProfileController::class, 'store'])->name('profile.store');

    // 商品一覧画面
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

    // 商品詳細画面
    Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

    Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store');

});








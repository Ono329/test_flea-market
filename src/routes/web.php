<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LikeController;


// 会員登録
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// メール認証画面
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// メール認証リンク
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// 再送信
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', '認証メールを再送しました');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ログイン画面
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 商品一覧画面
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

    // 商品詳細画面
    Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// ログイン必須のページ
Route::middleware(['auth' , 'verified'])->group(function () {

    // プロフィール設定画面
    Route::get('/mypage/profile', [ProfileController::class, 'index'])->name('profile.edit');
    Route::post('/mypage/profile', [ProfileController::class, 'store'])->name('profile.store');


    Route::post('/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

    Route::post('/favorite/{product}', [FavoriteController::class, 'toggle'])
    ->name('favorite.toggle');

    Route::get('/purchase/{product}', [PurchaseController::class, 'show'])
    ->middleware('auth')
    ->name('purchase.show');

    Route::post('/purchase/{product}', [PurchaseController::class,'store'])
    ->name('purchase.store');

    Route::get('/mylist', [ProductController::class,'mylist'])
    ->middleware('auth')
    ->name('products.mylist');

    Route::post('/like/{product}', [LikeController::class,'toggle'])
    ->middleware('auth')
    ->name('like.toggle');

    // 出品画面
    Route::get('/sell', [ProductController::class,'create'])
    ->name('products.create');

    // 出品処理
    Route::post('/sell', [ProductController::class,'store'])
    ->name('products.store');

    // 住所変更画面
    Route::get('/address/edit', [ProfileController::class, 'editAddress'])
    ->name('address.edit');

    Route::post('/address/edit', [ProfileController::class, 'updateAddress'])
    ->name('address.update');

    Route::get('/mypage', [ProfileController::class, 'mypage'])->name('mypage');

});








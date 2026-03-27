@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="product-detail">

    <div class="product-detail__image">
        <img src="{{ asset('storage/' . $product->img_url) }}" alt="{{ $product->name }}">
    </div>

    <div class="product-detail__info">
        <h1>{{ $product->name }}</h1>
        <p class="brand">{{ $product->brand }}</p>

        <p class="price">¥{{ number_format($product->price) }} (税込)</p>

    <div class="reaction">

    <!-- {{-- ログインしている場合 --}} -->
    @auth
    
    <form action="{{ route('like.toggle', $product->id) }}" method="POST">
    @csrf

    <button class="favorite-btn">
    
    @if ($product->likes->where('user_id', auth()->id())->count())

    <img src="{{ asset('images/ハートロゴ_ピンク.png') }}" >
    
    @else

    <img src="{{ asset('images/ハートロゴ_デフォルト.png') }}" >

    @endif

    <span class="count">{{ $product->likes->count() }}</span>

    </button>

    </form>
    @endauth

    <!-- {{-- 未ログイン --}} -->
    @guest
    <div class="favorite-btn">
    <a href="{{ route('login') }}">
    <img src="{{ asset('images/ハートロゴ_デフォルト.png') }}">
    </a>
        
    <span class="count">{{ $product->likes->count() }}</span>
    </div>
    @endguest

    <div class="comment-icon">

    <a href="{{ auth()->check() ? '#comment-form' : route('login') }}">

    <img src="{{ asset('images/ふきだしロゴ.png') }}" alt="comment">

    </a>

    <span class="count">{{ $product->comments->count() }}</span>

    </div>

    </div>

        <a href="{{ route('purchase.show',$product->id) }}" class="buy-button">
        購入手続きへ
        </a>

        <h3>商品説明</h3>
        <p>{{ $product->description }}</p>

        <h3>商品の情報</h3>

        <div class="product-category">
            <span class="category-label">カテゴリー</span>

            <div class="category-tags">
                 @foreach (json_decode($product->category, true) ?? [] as $category)
                    <span class="category-tag">{{ $category }}</span>
                @endforeach
            </div>
        </div>



        <p>商品の状態：{{ $product->condition }}</p>

        <h3>コメント ({{ $product->comments->count() }})</h3>

        @foreach ($product->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        <!-- {{-- ログインしている場合 --}} -->
        @auth
        <form id="comment-form" action="{{ route('comments.store') }}" method="POST">
        @csrf

        <textarea name="content" rows="4" class="comment-input" placeholder="こちらにコメントが入ります。">{{ old('content') }} </textarea>

        @error('content')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <button type="submit" class="buy-button">
        コメントを送信する
        </button>

        </form>
        @endauth

        <!-- {{-- 未ログインの場合 --}} -->
        @guest
        <textarea class="comment-input" placeholder="こちらにコメントが入ります。"></textarea>

        <a href="{{ route('login') }}" class="buy-button">
        コメントを送信する
        </a>
        @endguest

    </div>
</div>
@endsection
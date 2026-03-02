@extends('layouts.app')

@section('content')
<div class="product-detail">

    <div class="product-detail__image">
        <img src="{{ asset($product->img_url) }}" alt="{{ $product->name }}">
    </div>

    <div class="product-detail__info">
        <h1>{{ $product->name }}</h1>
        <p class="brand">{{ $product->brand }}</p>

        <p class="price">¥{{ number_format($product->price) }} (税込)</p>

        <a href="#" class="buy-button">購入手続きへ</a>

        <h3>商品説明</h3>
        <p>{{ $product->description }}</p>

        <h3>商品の情報</h3>
        <p>カテゴリー：{{ $product->category }}</p>
        <p>商品の状態：{{ $product->condition }}</p>

        <h3>コメント ({{ $product->comments->count() }})</h3>

        @foreach ($product->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <textarea name="content" rows="4"></textarea>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">コメントを送信する</button>
        </form>
        @endauth

    </div>
</div>
@endsection
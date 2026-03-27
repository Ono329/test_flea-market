@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">

    <div class="mypage-header">
        <div class="mypage-user">
            <div class="user-icon"></div>
            <h2 class="user-name">{{ $user->name }}</h2>
        </div>

        <div class="mypage-edit">
            <a href="{{ route('profile.edit') }}" class="edit-btn">プロフィールを編集</a>
        </div>
    </div>

    <div class="mypage-tabs">
        <a href="{{ route('mypage', ['page' => 'sell']) }}" class="tab {{ $page === 'sell' ? 'active' : '' }}">出品した商品</a>
        <a href="{{ route('mypage', ['page' => 'buy']) }}" class="tab {{ $page === 'buy' ? 'active' : '' }}">購入した商品</a>
    </div>

    <div class="product-list">
        @if ($page === 'buy')
            @foreach ($buyProducts as $purchase)
                <div class="product-card">
                    <div class="product-image">
                        @if($purchase->product && $purchase->product->img_url)
                            <img src="{{ asset('storage/' . $purchase->product->img_url) }}" alt="{{ $purchase->product->name }}">
                        @else
                            <span>商品画像</span>
                        @endif
                    </div>
                    <p class="product-name">{{ $purchase->product->name ?? '商品名なし' }}</p>
                </div>
            @endforeach
        @else
            @foreach ($sellProducts as $product)
                <div class="product-card">
                    <div class="product-image">
                    @if($product->img_url)
                        <img src="{{ asset('storage/' . $product->img_url) }}" alt="{{ $product->name }}">
                    @else
                        <span>商品画像</span>
                    @endif
                </div>
                <p class="product-name">{{ $product->name }}</p>
            </div>
        @endforeach
        @endif
    </div>

</div>
@endsection
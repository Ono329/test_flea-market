@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')

<!-- <form class="form" action="/list" method="post" novalidate>  -->
      <!-- @csrf   -->
<!-- </form> -->
<div class="item-content">
    <div class="tabs">
        <a href="#" class="tab">おすすめ</a>
        <a href="#" class="tab active">マイリスト</a>
    </div>

    <div class="item-list">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product->id) }}" class="item-card">
                <div class="item-card__image">
                    <img src="{{ asset($product->img_url) }}" alt="{{ $product->name }}">
                </div>
                <div class="item-card__name">
                    {{ $product->name }}
                </div>
            </a>
        @endforeach
    </div>
    
</div>
@endsection
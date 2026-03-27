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
        <a href="{{ route('products.index', ['keyword' => request('keyword')]) }}" class="tab">おすすめ</a>

        <!-- @auth -->
        <a href="{{ route('products.mylist', ['keyword' => request('keyword')]) }}" class="tab active">マイリスト</a>
        <!-- @endauth -->

    </div>

    <div class="item-list">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product->id) }}" class="item-card">
                <div class="item-card__image">

                @if($product->sold == 1)
                    <span class="sold-label">SOLD</span>
                @endif
                
                    <img src="{{ asset('storage/' . $product->img_url) }}" alt="{{ $product->name }}">
                </div>
                <div class="item-card__name">
                    {{ $product->name }}
                </div>
            </a>
        @endforeach
    </div>
    
</div>
@endsection
@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class="purchase-container">

<div class="purchase-left">
    <div class="product-info">
        <img src="{{ asset('storage/' . $product->img_url) }}" class="product-img">

    <div>
        <h2>{{ $product->name }}</h2>
        <p class="price">¥{{ number_format($product->price) }}</p>
    </div>

</div>

<hr>

<h3>支払い方法</h3>

<select name="payment_method" id="payment_method" class="payment-select" form="purchase-form">
    <option value="">選択してください</option>
    <option value="コンビニ払い">コンビニ払い</option>
    <option value="クレジットカード">クレジットカード</option>
</select>

@error('payment_method')
<p style="color:red; margin-top:8px;">支払い方法を選択してください</p>
@enderror

<hr>

<div class="purchase-section address-section">
    <div class="address-header">
        <h3>配送先</h3>
        <a href="{{ route('address.edit', ['product_id' => $product->id]) }}">変更する</a>
    </div>

    <p>〒{{ session('purchase_postal_code', auth()->user()->postal_code) }}</p>
    <p>
        {{ session('purchase_address', auth()->user()->address) }}
        {{ session('purchase_building', auth()->user()->building) }}
    </p>

</div>
</div>

<form id="purchase-form" action="{{ route('purchase.store',$product->id) }}" method="POST">
@csrf

<div class="purchase-right">

<div class="summary-box">
    <div class="summary-row">
        <span>商品代金</span>
        <span>¥{{ number_format($product->price) }}</span>
    </div>

    <div class="summary-row">
        <span>支払い方法</span>
        <span id="payment_method_text">選択してください</span>
    </div>
</div>

<button type="submit" class="purchase-button">
購入する
</button>
</div>
</form>



</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const paymentSelect = document.getElementById('payment_method');
    const paymentText = document.getElementById('payment_method_text');

    paymentSelect.addEventListener('change', function () {
        paymentText.textContent = this.value || '選択してください';
    });
});
</script>

@endsection
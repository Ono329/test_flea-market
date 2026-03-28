@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')

<div class="address-page">
    <form method="POST" action="{{ route('address.update') }}" class="address-form">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_id }}">


        <div class="address-form__inner">
            <h2 class="form-title">住所の変更</h2>

            <label>郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', auth()->user()->postal_code) }}">

            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}">

            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', auth()->user()->building) }}">

            <button type="submit" class="btn">更新する</button>
        </div>
    </form>
</div>
@endsection
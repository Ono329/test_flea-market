@extends('layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')

<h2 class="title">商品の出品</h2>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="sell-form">

    <h3>商品画像</h3>

    <div class="image-upload">

    <label class="image-label">
        画像を選択
        <input type="file" name="image" id="imageInput">
    </label>

    <p id="fileName">選択されていません</p>

    <img id="imagePreview" src="" alt="" style="display:none;">

    </div>

    <h3>商品の詳細</h3>

    <label>カテゴリー</label>
    <div class="category">
<label>
<input type="checkbox" name="category[]" value="ファッション">
<span>ファッション</span>
</label>

<label>
<input type="checkbox" name="category[]" value="家電">
<span>家電</span>
</label>

<label>
<input type="checkbox" name="category[]" value="インテリア">
<span>インテリア</span>
</label>

<label>
<input type="checkbox" name="category[]" value="レディース">
<span>レディース</span>
</label>

<label>
<input type="checkbox" name="category[]" value="メンズ">
<span>メンズ</span>
</label>

<label>
<input type="checkbox" name="category[]" value="コスメ">
<span>コスメ</span>
</label>

<label>
<input type="checkbox" name="category[]" value="本">
<span>本</span>
</label>

<label>
<input type="checkbox" name="category[]" value="ゲーム">
<span>ゲーム</span>
</label>

<label>
<input type="checkbox" name="category[]" value="スポーツ">
<span>スポーツ</span>
</label>

<label>
<input type="checkbox" name="category[]" value="キッチン">
<span>キッチン</span>
</label>

<label>
<input type="checkbox" name="category[]" value="ハンドメイド">
<span>ハンドメイド</span>
</label>

<label>
<input type="checkbox" name="category[]" value="アクセサリー">
<span>アクセサリー</span>
</label>

<label>
<input type="checkbox" name="category[]" value="おもちゃ">
<span>おもちゃ</span>
</label>

<label>
<input type="checkbox" name="category[]" value="ベビー・キッズ">
<span>ベビー・キッズ</span>
</label>


    </div>

    <label>商品の状態</label>
    <select name="condition">
        <option value="">選択してください</option>
        <option value="良好">良好</option>
        <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
        <option value="やや傷や汚れあり">やや傷や汚れあり</option>
        <option value="状態が悪い">状態が悪い</option>
    </select>

    <h3>商品名と説明</h3>

    <label>商品名</label>
    <input type="text" name="name">

    <label>ブランド名</label>
    <input type="text" name="brand">

    <label>商品の説明</label>
    <textarea name="description"></textarea>

    <label>販売価格</label>

    <div class="price-input">
        <span>¥</span>
        <input type="number" name="price">
    </div>

    <button type="submit" class="sell-btn">
        出品する
    </button>

</div>

</form>

@endsection

<script>
document.getElementById('imageInput').addEventListener('change', function(){
    const fileName = this.files[0]?.name || "選択されていません";
    document.getElementById('fileName').textContent = fileName;
});
</script>
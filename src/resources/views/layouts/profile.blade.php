<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフィール</title>
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
  <link rel="stylesheet" href="{{ asset('css/items.css') }}">
  <link rel="stylesheet" href="{{ asset('css/show.css') }}">
  <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
 
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <!-- <a class="header__logo" href="/"> -->
        
          <img src="{{ asset('images/header.png') }}" alt="ヘッダー画像">  
        <!--</a>-->
          <!-- COACHTECH -->
        <!-- </a> -->

        <form action="{{ route('products.index') }}" method="GET" class="search-form">
          <input 
              type="text" 
              name="keyword"
              placeholder="なにをお探しですか?"
              value="{{ request('keyword') }}">
        </form>
      </div>

        <nav>
    <ul class="header-nav">

    <li class="header-nav__item">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-button">ログアウト</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="header-nav__link">ログアウト</a>
        @endauth
    </li>

    <li class="header-nav__item">
        <a href="{{ auth()->check() ? route('mypage') : route('login') }}"
           class="header-nav__link">
           マイページ
        </a>
    </li>

    <li class="header-nav__item">
        <a href="{{ auth()->check() ? '/sell' : route('login') }}"
           class="header-nav__button">
           出品
        </a>
    </li>

</ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>

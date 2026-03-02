<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフィール</title>
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
  <link rel="stylesheet" href="{{ asset('css/items.css') }}">
 
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

        <form class="search-form">
          <input type="text" placeholder="なにをお探しですか?">
        </form>
      </div>

        <nav>
          <ul class="header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
              <form action="{{ route('logout') }}" method="POST" >
                  @csrf 
                <button class="logout-button">ログアウト</button>
              </form>
              <a class="header-nav__link" href="/mypage/profile">マイページ</a>
              <a class="header-nav__button" href="/sell">出品</a>
            </li>
            
            @endif
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

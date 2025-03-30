<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coachtech</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @yield('css')
    </head>

    <body>
        <header class="header">
            <div class="header__inner">
                <div class="header-utilities">
                    <a href="{{ url('/') }}" class="header__logo">Coachtech</a>
                    <nav>
                        <ul class="header-nav">
                            <!-- ログイン・新規登録ページ以外の場合のみリンクを表示 -->
                            @if(!Route::is('login') && !Route::is('register'))
                                <li class="header-nav__search">
                                        <form action= method="GET">
                                        <input type="text" name="query" class="search-input" placeholder="何をお探しですか" value="{{ request('query') }}">
                                        </form>
                                    </li>

                                @guest
                                    <li><a href="{{ route('login') }}">ログイン</a></li>
                                    <li><a href="{{ route('login') }}">マイページ</a></li>
                                    <li><a href="{{ route('login') }}">出品</a></li>
                                @endguest

                                @auth
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="header-nav__button">ログアウト</button>
                                        </form>
                                    </li>
                                    <li><a href="{{ route('mypage') }}">マイページ</a></li>
                                <li><a href="{{ route('sell') }}">出品</a></li>
                                @endauth
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

            <div class="container">
                @yield('content')
            </div>

        <footer>
        </footer>
        <!-- JavaScript のセクション -->
        @yield('js') <!-- ここで JavaScript を読み込む -->
    </body>

</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/style.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="header-logo">
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="coachtech">
                </a>
            </div>
            @unless(Route::is('login') || Route::is('register'))
                <div class="header-search">
                    <form action="{{route('item.index')}}" method="get" class="search-form">
                        <input class="search-text" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="なにをお探しですか？">
                    </form>
                </div>

                <nav class="header-nav">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="login-link">ログイン</a>
                    @endauth
                    <a href="{{ route('profile.index') }}" class="profile-link">マイページ</a>
                    <a href="{{ route('sell.show') }}" class="sell-link">出品</a>
                </nav>
            @endunless
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
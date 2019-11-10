<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MyNote</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')

</head>
<body>
    <head>
            <nav>
                <ul>
                    @auth
                    <div>
                        <li><a href="{{ url('/') }}">{{ __('サイトトップ') }}</a></li>
                        <li><a href="{{ url('/home') }}">{{ __('ホーム') }}</a></li>
                    </div>
                    <div>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </div>
                    @endauth

                    @guest
                        <div>
                            <a href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            <a href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </div>
                    @endguest

                </ul>
            </nav>
        </head> 

    <div id="main-wrapper">
        @yield('content')
    </div>

    <footer>
        copy right my note
    </footer>
<script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
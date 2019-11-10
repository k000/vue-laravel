<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>
    <body>


        <header>
            <nav>
                <h1>MyNote</h1>
            </nav>
            <ul>
                @guest
                    <li>
                        <a href="{{ route('/login') }}">ログイン</a>
                    </li>
                @else
                    <li>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ __('サイトトップ') }}
                        </a>
                    </li>
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
                @endguest
            </ul>
        </header>

        @guest
            <p>ゲストです</p>

        @endguest

        <div id="app">
            <app-component></app-component>
        </div>


        <footer>
            <p>copy right my note</p>
        </footer>


    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>

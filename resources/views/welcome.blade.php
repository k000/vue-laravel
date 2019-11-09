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
        </header>


        <div id="app">
            <app-component></app-component>
        </div>


        <footer>
            <p>copy right my note</p>
        </footer>


    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>

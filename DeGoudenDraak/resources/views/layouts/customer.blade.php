<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>De Gouden Draak</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    body {margin: 0;}

    @font-face {
        font-family: 'chinese_takeawayregular';
        src: url('../fonts/chinesetakeaway-webfont.woff2') format('woff2'),
        url('../fonts/chinesetakeaway-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    a {text-decoration: none;
        color: yellow;}
</style>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="vertical-align: middle;" src="../pictures/dragon-small.png" alt="Golden Dragon" height="50px">
                <span style="font-family:'chinese_takeawayregular'">De Gouden Draak</span>
                <img style="vertical-align: middle;" src="../pictures/dragon-small-flipped.png" alt="Golden Dragon" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                </ul>
            </div>
        </div>
    </nav>

    <div>
        @yield("content")
    </div>
</div>
</body>

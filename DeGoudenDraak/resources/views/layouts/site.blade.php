<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    body {background-color: red; margin: 0;}
    td {padding: 0px;}

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
                <img style="vertical-align: middle;" src="pictures/dragon-small.png" alt="Golden Dragon" height="50px">
                <span style="font-family:'chinese_takeawayregular'">De Gouden Draak</span>
                <img style="vertical-align: middle;" src="pictures/dragon-small-flipped.png" alt="Golden Dragon" height="50px">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/contact" style="color: black">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu" style="color: black">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news" style="color: black">Nieuws</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/offers" style="color: black">Aanbiedingen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/option" style="color: black">Bestellen</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

<table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
    <tr style="height:7px;background-color:red">
        <td colspan="9">
        </td>
    <tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        </td>
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px"></td>
        <td></td>
        <td style="width:25px"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:50px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
        <td style="width:25px;"></td>
        <td style="width:25px;"></td>
        <td style="text-align:center">
            <!-- CONTENT HERE! -->
            <table width=100%>
                <tr>
                    <td colspan='3'>
                        <p>
                            <img src="pictures/dragon-small.png" style="float:left;height:200px" alt="Golden Dragon">
                            <img src="pictures/dragon-small-flipped.png" style="float:right;height:200px" alt="Golden Dragon">
                            <span style="font-size:40px;font-weight:bold;color:yellow">Chinees Indische Specialiteiten</span><br>
                            <span style="font-size:50px;font-weight:bold;color:yellow">De Gouden Draak</span><br>
                        </p>
                    </td>
                </tr>
                <tr style="padding-top:50px">
                    <td colspan="3" height="50px">
                    </td>
                </tr>
                <tr style="padding-top:50px">
                    <td width="50px">
                    </td>
                    <td align="center" style='border:1px solid black; background:floralwhite; height: 450px'> <br>
                        @yield("content")
                    </td>
                    <td width="50px">
                    </td>
                </tr>
            </table>
            <br>
        </td>
        <td style="width:25px;"></td>
        <td style="width:25px;"></td>
        <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px"></td>
        <td></td>
        <td style="width:25px"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:25px;background-color:red">
        <td width="7px">
        </td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow"></td>
        <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-left:4px solid yellow;"></td>
        <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
        <td width="7px">
    </tr>
    <tr style="height:7px;background-color:red">
        <td colspan="9">
        </td>
    <tr>
</table>
</body>
</html>

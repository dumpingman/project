<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/index') }}">
                       <!--  {{ config('app.name', 'Laravel') }} -->
                       <img class="webicon" src="{{asset('images/hands.png')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <!-- ハンバーガーメニュー -->
                                <!-- <div class="hamburger-menu">
                                <input type="checkbox" id="menu-btn-check">
                                <label for="menu-btn-check" class="menu-btn"><span></span></label>
                                </div>
 -->
<!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
    <input type="checkbox" id="drawer-check" class="drawer-hidden" >

    <!-- ハンバーガーアイコン -->
    <label for="drawer-check" class="drawer-open"><span></span></label>

    <!-- 追加：メニューを閉じるための要素 -->
    <label for="drawer-check" class="drawer-close"></label>

                            <nav class="drawer-content">
                            <ul class="drawer-list">
                                <li class="drawer-item"><a href="/profile">ユーザープロフィール</a></li>
                                <li class="drawer-item"><a href="/userlist">ユーザー検索</a></li>

                                 <li class="drawer-item"><a href="/projectlist">応募状況</a></li>
                            </ul>
                            </nav>


                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/accordion.js"></script>
</body>
</html>

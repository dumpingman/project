<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background:linear-gradient(to top,#3C4767,#ff4500  );
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <img src="{{asset('images/hands.png')}}">
    <h1>ログアウトしました</h1><br>
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="/login">ログインページへ</a>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                       <!--  <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>

<!doctype html>
<<<<<<< HEAD
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
=======
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
<<<<<<< HEAD
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
=======
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
<<<<<<< HEAD
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
=======
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5
                height: 100vh;
                margin: 0;
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
<<<<<<< HEAD
                font-size: 12px;
=======
                font-size: 13px;
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
<<<<<<< HEAD
                        <a href="{{ route('register') }}">Register</a>
=======

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
<<<<<<< HEAD
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
=======
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
>>>>>>> 400c5d64ebc4b18bc46194f7d73eca1bedcfd2b5
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

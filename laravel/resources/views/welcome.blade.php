<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IHM</title>

        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div id="app">
            <navbar-component></navbar-component>
            <div style="background:linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) ),url('https://freerangestock.com/sample/120965/overhead-view-of-a-laptop-and-a-stethoscope--medical-work.jpg');height:600px;width:100%; background-size:cover; ">

            </div>

        </div>
        {{-- On garde ce code pour les routes de Login --}}
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

        <script src="js/app.js"></script>
    </body>
</html>

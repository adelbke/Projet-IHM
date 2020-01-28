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
        @auth
        <navbar-component first-name="{{auth()->user()->Firstname}}"
            last-name="{{auth()->user()->Lastname}}"
            csrf="{{ csrf_token() }}"></navbar-component>
            @endauth
            @guest
            <navbar-component></navbar-component>
            @endguest
            <div style="background:linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ),url('/images/home-banner.jpg');width:100%; background-size:cover;"
            class="container-fluid pt-5 pb-4">

                <div class="row mt-5">
                    <div class="col-md-12 mb-3 col-12">
                        <h1 class="h1 text-center text-white text-shadow"> ASIC </h1>
                        <h4 class="h4 text-center text-white">The Algerian Skin Imaging Collaboration</h4>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12 col-12">
                        <filter-component csrf="{{csrf_token()}}"></filter-component>
                    </div>
                </div>

            </div>

        <!----------------- la partie main  ------------------------------->
        <content-component csrf="{{csrf_token()}}"></content-component>

        <footer id="sticky-footer" class="py-4 bg-light text-dark">
            <div class="container text-center">
                <small>Copyright &copy; ASIC</small>
            </div>
        </footer>

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

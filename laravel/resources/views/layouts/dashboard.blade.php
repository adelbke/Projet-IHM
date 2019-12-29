<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @stack('title')</title>

    <link rel="stylesheet" href="/css/app.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    @stack('css')
</head>
<body>

    <div id="app">
        @yield('content')
    </div>

    @stack('js')
    <script src="/js/app.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
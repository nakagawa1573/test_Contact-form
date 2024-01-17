<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    @yield('css')
    <title>Contact</title>
</head>

<body>
    <header class="header">
        <h1 class="header__ttl">
            FashionablyLate
        </h1>
        @yield('button')
    </header>
    <main>
        <h2 class="main__ttl">
            @yield('title')
        </h2>
        @yield('content')
    </main>
</body>

</html>

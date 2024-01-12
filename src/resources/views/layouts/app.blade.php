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

        <div class="header__ttl">
            <p class="header__ttl-txt">
                FashionablyLate
            </p>
        </div>
        @yield('button')

    </header>
    <main>

        <div class="main__ttl">
            <p class="main__ttl-txt">
                @yield('title')
            </p>
        </div>
        @yield('content')

    </main>
</body>

</html>

<!doctype html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-DNS-Prefetch-Control" content="on" />
    <meta name="keywords" content="@stack('keywords')" />
    <meta name="description" content="@stack('description')" />
    <meta name="theme-color" content="#65429a" />
    <meta name="csrf-token" content="{{ \csrf_token() }}"/>

    <title>@stack('title'){{ \config('app.name') }}</title>

    <link rel="dns-prefetch" href="{{ \config('app.url') }}" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />

    <link rel="shortcut icon" href="/x32.png" />
    <link rel="apple-touch-icon" sizes="32x32" href="/x32.png" />
    <link rel="apple-touch-icon" sizes="64x64" href="/x64.png" />
    <link rel="apple-touch-icon" sizes="128x128" href="/x128.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&subset=cyrillic" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,400i,700,700i" />

    <link rel="stylesheet" href="{{ \asset_ts('app.min.css') }}" />
    <script async="async" src="{{ \asset_ts('app.min.js') }}"></script>
</head>
<body>
    <main id="main">
        @yield('content')
    </main>
</body>
</html>

<!doctype html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=320,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="@stack('keywords')" />
    <meta name="description" content="@stack('description')" />
    <meta name="theme-color" content="#65429a" />
    <meta name="csrf-token" content="{{ \csrf_token() }}"/>
    <title>@stack('title') | {{ \config('app.name') }}</title>
    @include('layout.partials.prefetch')
    @include('layout.partials.icons')

    @env('production')
        <link rel="stylesheet" href="{{ \asset_ts('app.min.css') }}" />
        @include('partials.metrika')
    @else
        <link rel="stylesheet" href="{{ \asset_ts('app.dev.css') }}" />
    @endenv
</head>
<body>
    <main id="main">
        @section('header')
            <app-header :logo="false">
                @include('partials.header')
            </app-header>
        @show

        @yield('content')

        @section('footer')
            @include('partials.footer')
        @show
    </main>

    @env('production')
        @include('partials.browser')
        <script src="{{ \asset_ts('app.min.js') }}"></script>
    @else
        <script async="async" src="{{ \asset_ts('app.dev.js') }}"></script>
    @endenv
</body>
</html>

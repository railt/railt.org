<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@section('title')Home @show &mdash; Railt</title>
    <meta name="keywords" content="@stack('keywords')" />
    <meta name="description" content="@stack('description')" />
    <meta name="theme-color" content="#65429a" />
    <meta name="csrf-token" content="{{ \csrf_token() }}" />
    <meta name="auth-token" content="{{ $token }}" />
    @include('layout.partials.assets')
    @include('layout.partials.prefetch')
    @include('layout.partials.icons')
</head>
<body>
    <main id="app" class="layout">
        <a href="#" id="page-top" name="page-top"></a>
        @yield('content')
    </main>
    @include('layout.partials.analytics')
</body>
</html>

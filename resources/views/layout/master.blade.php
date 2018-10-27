<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layout.partials.head')
    @stack('head')
</head>
<body style="opacity: 0" class="@stack('body-class')" itemscope itemtype="http://schema.org/WebSite">
    <link itemprop="url" href="{{ \route('home') }}" />

    <main id="app" class="layout">
        @section('header')
            @include('partials.header')
        @show

        <section class="main">
            @yield('content')
        </section>

        @section('footer')
            @include('partials.footer')
        @show
    </main>

    @include('partials.analytics')
</body>
</html>

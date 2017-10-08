<partial-header>
    <a href="{{ route('home') }}" class="logo">
        <img src="/img/logo-dark.svg" alt="logo" />
    </a>

    @yield('menu')

    <template slot="lang">
        @yield('lang')
    </template>
</partial-header>

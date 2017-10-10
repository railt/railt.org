@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@section('content')
    @include('partials.header')

    <page-home
        about="@lang('splash.this')"
        :variants='@json(__("splash.about"))'
    >
        <template slot="header">
            @yield('menu')
        </template>

        <template slot="main">
            <h3>@lang('home.main.title')</h3>
            <p>@lang('home.main.content')</p>
        </template>

        <template slot="docs">
            <h3>@lang('home.docs.title')</h3>
            <p>@lang('home.docs.content')</p>
            <ui-button href="{{ \route('docs') }}" target="blank" view="simple">
                @lang('home.docs.button')
            </ui-button>
        </template>

        <template slot="github">
            <h3>@lang('home.github.title')</h3>
            <p>@lang('home.github.content')</p>
            <ui-button href="https://github.com/railt/railt" target="blank" view="simple">
                @lang('home.github.button')
            </ui-button>
        </template>

        <template slot="lang">
            @yield('lang')
        </template>
    </page-home>
@stop

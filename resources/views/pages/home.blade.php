@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@section('content')
    @include('partials.header')

    <page-home about="@lang('splash.this')" :variants='@json(__("splash.about"))'>
        <template slot="header">
            @yield('menu')
        </template>
        <template slot="lang">
            @yield('lang')
        </template>
    </page-home>
@stop

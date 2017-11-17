@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@push('title', \trans('nav.chat') . ' &mdash; ')

@section('content')
    <partial-header :search-enable="true" search-placeholder="@lang('nav.search')">
        <a href="{{ route('home') }}" class="logo">
            <img src="/img/logo-dark.svg" alt="logo"/>
        </a>

        @yield('menu')

        <template slot="lang">
            @yield('lang')
        </template>
    </partial-header>

    <page-chat join-button="{{ $join }}"></page-chat>
@stop

@section('footer', '')
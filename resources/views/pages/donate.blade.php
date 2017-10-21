@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@push('title', \trans('nav.donate') . ' &mdash; ')

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

    <page-donate
            dest="@lang('donate.dest')"
            label="{{ $label }}"
            receiver="{{ $receiver }}"
            sum="@lang('donate.sum')"
            description="@lang('donate.description')"
            comment="@lang('donate.comment')"
            donate="@lang('donate.button')"
            by-bank="@lang('donate.by.bank')"
            by-mobile="@lang('donate.by.mobile')"
            by-yandex-money="@lang('donate.by.yandex-money')"
    ></page-donate>
@stop

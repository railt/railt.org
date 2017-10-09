@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@push('title', $content ? $content->title . ' &mdash; ' : 'Aaaaargh, 404! &mdash; ')

@section('content')
    <partial-header>
        <a href="{{ route('home') }}" class="logo">
            <img src="/img/logo-dark.svg" alt="logo" />
        </a>

        <div class="search">
            <ui-text view="flat" placeholder="@lang('nav.search')"></ui-text>
        </div>

        @yield('menu')

        <template slot="lang">
            @yield('lang')
        </template>
    </partial-header>

    <page-docs>
        <template slot="nav">
            {!! $nav !!}
        </template>
        <template slot="content">
            @if ($content)
                {!! $content->content_rendered !!}
            @else
                @include('pages.404')
            @endif
        </template>
    </page-docs>
@stop

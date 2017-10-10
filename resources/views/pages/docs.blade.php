@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@push('title', $content ? $content->title . ' &mdash; ' : 'Aaaaargh, 404! &mdash; ')

@section('content')
    <partial-header :search-enable="true" search-placeholder="@lang('nav.search')">
        <a href="{{ route('home') }}" class="logo">
            <img src="/img/logo-dark.svg" alt="logo" />
        </a>

        @yield('menu')

        <template slot="lang">
            @yield('lang')
        </template>
    </partial-header>

    <page-docs>
        @if($nav)
        <template slot="nav">
            <aside class="nav">
                {!! $nav->content_rendered !!}
            </aside>
        </template>
        @endif
        <template slot="content">
            @if ($content)
                {!! $content->content_rendered !!}
            @else
                @include('pages.404')
            @endif
        </template>
    </page-docs>
@stop

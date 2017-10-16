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

                <div class="menu">
                    @menu($nav, $childNav)
                </div>
            </aside>
        </template>
        @endif
        <template slot="content">
            <nav class="breadcrumbs">
                @nav('<a href="%s">%s</a>', '<span data-uri="%s">%s</span>')
            </nav>
            @if ($content)
                {!! $content->content_rendered !!}
            @else
                @include('pages.404')
            @endif
        </template>
    </page-docs>
@stop

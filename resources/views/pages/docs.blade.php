@extends('layout.master')

<?php /** @var \App\Entity\Page $page */ ?>

@push('title', $page->getTitle())

@section('header')
    <app-header :logo="true">
        @include('partials.header')
    </app-header>
@stop

@section('content')
    <app-docs>
        <template slot="menu">
            {!! $menu->getContent() !!}
        </template>

        @if(\count($pages) > 1)
        <template slot="breadcrumbs">
            <?php /** @var \App\Entity\Page[] $pages */ ?>
            @foreach($pages as $page)
                @unless ($loop->last)
                    <a href="{{ $page->getRoute('docs', $lang) }}">{{ $page->getTitle() }}</a>
                    <span class="delimiter">/</span>
                @else
                    <span>{{ $page->getTitle() }}</span>
                @endunless
            @endforeach
        </template>
        @endif

        <template slot="content">
            {!! $page->getContent() !!}
        </template>
    </app-docs>
@stop

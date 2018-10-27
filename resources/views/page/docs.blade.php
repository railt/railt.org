@extends('layout.master')

@section('title', $document->getTitle())

@section('content')
    <app-docs>
        <template slot="navigation">
            @if($document->getUrn() !== '')
                @include('page.docs.breadcrumbs', ['document' => $document])
            @endif

            <app-search
                placeholder="@lang('search...')"
                lang-searching="@lang('Looking for documentation...')"
                lang-not-found="@lang('No results found for your request')"
                lang-typing="@lang('Start typing text to search documentation')"
            ></app-search>
        </template>

        <template slot="menu" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
            @include('page.docs.menu', ['items' => $menu, 'current' => $document])
        </template>

        <?php /** @var \App\Entity\Document $document */ ?>
        <template slot="content">
            <h1>{{ $document->getTitle() }}</h1>

            @include('page.docs.nav', ['document' => $document])

            <app-content>
                {!! $document->getContent() !!}
            </app-content>
        </template>
    </app-docs>
@stop

@extends('layout.master')

@include('partials.language')
@include('partials.menu')

@section('content')
    @include('partials.header')

    <page-docs>
        <template slot="nav">
            {!! $nav !!}
        </template>
        <template slot="content">
            {!! $content !!}
        </template>
    </page-docs>
@stop

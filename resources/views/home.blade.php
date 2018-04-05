@extends('layout.master')

@section('content')
    <header-item></header-item>

    <article class="page-container">
        <transition name="page-loading">
            <router-view></router-view>
        </transition>
    </article>
@stop

@extends('layout.master')

@section('content')
    <app-header>
        <router-link to="/docs">Документация</router-link>
        <router-link to="/language">GraphQL</router-link>
        <router-link to="/github">GitHub</router-link>
        <router-link to="/chat">Чат</router-link>
    </app-header>

    <article class="page-container">
        <transition name="transition-page">
            <router-view></router-view>
        </transition>
    </article>
@stop

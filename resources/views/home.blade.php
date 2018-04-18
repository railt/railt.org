@extends('layout.master')

@section('content')
    <app-header>
        <router-link to="/docs">Документация</router-link>
        <a href="https://github.com/railt/railt" target="_blank">GitHub</a>
        <a href="https://discord.gg/ND7SpD4" target="_blank">Чат</a>
    </app-header>

    <article class="page-container">
        <transition name="transition-page">
            <router-view></router-view>
        </transition>
    </article>
@stop

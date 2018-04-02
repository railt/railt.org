@extends('layout.master')

@section('content')
    <header class="header">
        <div class="container">
            <router-link to="/" class="logo"></router-link>

            <nav class="menu">
                <router-link to="/docs">Документация</router-link>
                <router-link to="/language">GraphQL</router-link>
                <router-link to="/github">GitHub</router-link>
                <router-link to="/chat">Чат</router-link>

                <dropdown>
                    <dropdown-item :default="true">Русский</dropdown-item>
                    <dropdown-item>English</dropdown-item>
                </dropdown>
            </nav>
        </div>
    </header>

    <router-view></router-view>
@stop

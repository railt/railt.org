@extends('layout.master')

@section('content')
    <app-header>
        <router-link to="/docs">Documentation</router-link>
        <a href="https://github.com/railt/railt" target="_blank">
            <img src="/images/github.svg" alt="GitHub" style="display: none" />
            GitHub
        </a>
        <a href="https://discord.gg/ND7SpD4" target="_blank">
            <img src="/images/discord.svg" alt="Discord" style="display: none" />
            Chat
        </a>

        <template slot="aside">
            <?php /** @var $language \App\Entity\Language */ ?>
            @foreach($languages as $language)
                <a href="{{ route('home.language', ['domain' => $language->getNameIdentifier()]) }}"
                   class="{{ $language === $current ? 'router-link-active' : '' }}"
                >
                    {{ $language->getTitle() }}
                </a>
            @endforeach
        </template>
    </app-header>

    <article class="page-container">
        <transition name="transition-page">
            <router-view></router-view>
        </transition>
    </article>
@stop

@extends('layout.master')

@push('description', 'A modern framework for creating and designing GraphQL servers using PHP.')
@push('keywords', 'Railt, GraphQL, SDL, Grammar, Framework, PHP, Lexing, Dependency Injection, Modern, Fast, Easy')

@section('content')
    <app-splash>
        <template slot="title">The GraphQL Framework</template>
        <template slot="image">
            <img src="/images/splash/home.png" alt="Railt">
        </template>
    </app-splash>

    <app-section :color="'purple'" title="@lang('A new era of <strong>GraphQL SDL</strong>')">
        <template slot="content">
            <article class="column">
                @lang('home.sdl')
            </article>
            <article class="column">
                <app-tabs>
                    <app-tab title="Root Directives">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.root-directives'))
                        !!}</code></pre>
                    </app-tab>
                    <app-tab title="Routing">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.routing'))
                        !!}</code></pre>
                    </app-tab>
                    <app-tab title="LSP Overloading">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.lsp'))
                        !!}</code></pre>
                    </app-tab>
                    {{--
                    <app-tab title="Namespaces">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.namespaces'))
                        !!}</code></pre>
                    </app-tab>
                    <app-tab title="Variables">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.vars'))
                        !!}</code></pre>
                    </app-tab>
                    <app-tab title="Generics">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.generics'))
                        !!}</code></pre>
                    </app-tab>
                    <app-tab title="Inheritance">
                        <pre><code data-language="sdl">{!!
                            highlight('sdl', $__env->make('page.home.inheritance'))
                        !!}</code></pre>
                    </app-tab>
                    --}}
                </app-tabs>
            </article>
        </template>
    </app-section>

    <app-section :color="'dark'" :class="{github: true}">
        <template slot="content" class="github">
            <article class="column">
                <img src="/images/home/github.png" alt="GitHub" />
            </article>
            <article class="column">
                <h2>@lang('Railt is <strong>open source</strong>')</h2>

                <p>@lang('home.open-source')</p>

                <a href="https://github.com/railt/railt" target="_blank" rel="nofollow" class="button">GitHub</a>
            </article>
        </template>
    </app-section>

    <app-section :color="'white'" title="@lang('Did someone say <strong>incredibly?</strong>')">
        <template slot="content">
            <div class="callout">
                <a href="https://github.com/railt/sdl" target="_blank">
                    <h3>GraphQL RL/SDL <img src="/images/callout/sdl.png" alt="GraphQL SDL" /></h3>
                    <p>@lang('home.packages.sdl')</p>
                </a>
            </div>
            <div class="callout">
                <a href="/docs/app/routing" target="_blank">
                    <h3>Router <img src="/images/callout/router.png" alt="Router" /></h3>
                    <p>@lang('home.packages.router')</p>
                </a>
            </div>
            <div class="callout">
                <a href="https://github.com/railt/discover" target="_blank">
                    <h3>Discover <img src="/images/callout/discover.png" alt="Discover" /></h3>
                    <p>@lang('home.packages.discover')</p>
                </a>
            </div>
            <div class="callout">
                <a href="https://github.com/railt/parser" target="_blank">
                    <h3>Parser <img src="/images/callout/parser.png" alt="Parser" /></h3>
                    <p>@lang('home.packages.parser')</p>
                </a>
            </div>
            <div class="callout">
                <a href="https://github.com/railt/container" target="_blank">
                    <h3>Container <img src="/images/callout/container.png" alt="Container" /></h3>
                    <p>@lang('home.packages.container')</p>
                </a>
            </div>
            <div class="callout">
                <a href="https://github.com/railt/lexer" target="_blank">
                    <h3>Lexer <img src="/images/callout/lexer.png" alt="Lexer" /></h3>
                    <p>@lang('home.packages.lexer')</p>
                </a>
            </div>
        </template>
    </app-section>
@stop

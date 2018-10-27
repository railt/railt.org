<app-footer :year="'{{ date('Y') }}'">
    <nav class="column">
        <h4>@lang('Railt')</h4>

        <a itemprop="url" href="{{ route('docs') }}">
            <span itemprop="name">@lang('Docs')</span>
        </a>

        @if(app()->isLocal())
            <a itemprop="url" href="{{ route('blog') }}">
                <span itemprop="name">@lang('Blog')</span>
            </a>

            <a itemprop="url" href="{{ route('community') }}">
                <span itemprop="name">@lang('Community')</span>
            </a>
        @endif
    </nav>
    <nav class="column">
        <h4>@lang('Community')</h4>
        <a href="https://discord.gg/ND7SpD4" rel="nofollow" target="_blank">
            @lang('Discord')
        </a>
        <a href="https://github.com/railt" target="_blank">
            @lang('GitHub')
        </a>
    </nav>
    <nav class="column">
        <h4>@lang('Frameworks')</h4>
        <a href="https://github.com/railt/laravel-provider" target="_blank">
            @lang('Railt For Laravel')
        </a>
        <a href="https://github.com/railt/symfony-bundle" target="_blank">
            @lang('Railt For Symfony')
        </a>
    </nav>
</app-footer>

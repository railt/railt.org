<app-header>
    <template slot="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset_ts('images/logo-dark.svg') }}" alt="Railt" />
            @if($nav->match('docs'))
                <span>Docs</span>
            @elseif($nav->match('blog'))
                <span>Blog</span>
            @elseif($nav->match('community'))
                <span>Community</span>
            @endif
        </a>
    </template>

    <template slot="nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <a itemprop="url" href="{{ route('docs') }}" class="{{ $nav->match('docs') }}">
            <span itemprop="name">@lang('Docs')</span>
        </a>

        @if(app()->isLocal())
            <a itemprop="url" href="{{ route('blog') }}" class="{{ $nav->match('blog') }}">
                <span itemprop="name">@lang('Blog')</span>
            </a>

            <a itemprop="url" href="{{ route('community') }}" class="{{ $nav->match('community') }}">
                <span itemprop="name">@lang('Community')</span>
            </a>
        @endif

        <a itemprop="url" href="https://github.com/railt/railt" target="_blank">
            <span itemprop="name">@lang('GitHub')</span>
        </a>

        <a itemprop="url" href="https://discord.gg/ND7SpD4" rel="nofollow" target="_blank">
            <span itemprop="name">@lang('Discord')</span>
        </a>

        <app-dropdown :class="{'language-dropdown': true}">
            <template slot="title" :title="'{{ $language->getName() }}'">
                <img src="/images/icons/globe.svg" alt="Globe" />
                {{ $language->getCode() }}
            </template>

            <template slot="selections">
                @foreach($languages as $l)
                    <div class="item-cell">
                        <a itemscope itemtype="http://schema.org/Language"
                            href="{{ route('language', ['lang' => $l->getCode()]) }}"
                            class="{{ $l->getCode() === $language->getCode() ? 'active' : '' }}">
                            <span itemprop="name">{{ $l->getName() }}</span>
                        </a>
                    </div>
                @endforeach
            </template>
        </app-dropdown>
    </template>
</app-header>

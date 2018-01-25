
<a href="{{ route('docs', ['lang' => $lang]) }}">@lang('nav.docs')</a>


<el-dropdown :show-timeout="50" :hide-timeout="500">
    <span class="el-dropdown-link">
        @lang('nav.eco')<i class="el-icon-arrow-down el-icon--right"></i>
    </span>

    <el-dropdown-menu slot="dropdown">
        <a href="https://github.com/railt/railt" class="el-dropdown-menu__item"
           target="_blank">@lang('nav.github')</a>

        <a href="https://discord.gg/ND7SpD4" class="el-dropdown-menu__item"
           target="_blank">@lang('nav.chat')</a>

        {{--<a href="#" class="el-dropdown-menu__item el-dropdown-menu__item--divided">
            @lang('nav.donate')
        </a>--}}
    </el-dropdown-menu>
</el-dropdown>


<el-dropdown :show-timeout="50" :hide-timeout="500">
    <span class="el-dropdown-link">
        @lang('nav.language')<i class="el-icon-arrow-down el-icon--right"></i>
    </span>

    <el-dropdown-menu slot="dropdown">
        <?php /** @var $languages \App\Entity\Language[] */ ?>
        @foreach($languages as $language)
            <a href="{{ \route('home', ['lang' => $language->getCode()]) }}"
               class="el-dropdown-menu__item">{{ $language->getTitle() }}</a>
        @endforeach
    </el-dropdown-menu>
</el-dropdown>

{{--
<a href="#" class="console">
    <i class="el-icon-news">&nbsp;&nbsp;&nbsp;</i>@lang('nav.console')
</a>
--}}

@section('menu')
    <a href="{{ \route('docs') }}">
        @lang('nav.docs')
    </a>
    <a href="{{ \route('try-online') }}">
        @lang('nav.try-it')
    </a>
    <a href="{{ \route('chat') }}">
        <ui-tooltip direction="bottom">@lang('nav.chat')</ui-tooltip>
        @include('icons.discord')
    </a>
    <a href="https://github.com/railt/railt" target="_blank">
        <ui-tooltip direction="bottom">@lang('nav.github')</ui-tooltip>
        @include('icons.github')
    </a>
    <a href="{{ \route('donate') }}">
        <ui-tooltip>@lang('nav.donate')</ui-tooltip>
        @include('icons.yandex')
    </a>
@stop

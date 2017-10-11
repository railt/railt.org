@section('menu')
    <a href="{{ \route('docs') }}">
        @lang('nav.docs')
    </a>
    <a href="https://discord.gg/ND7SpD4" target="_blank">
        @lang('nav.chat')
    </a>
    <a href="https://github.com/railt/railt" target="_blank">
        @lang('nav.github')
    </a>
    <a href="{{ \route('donate') }}">
        @lang('nav.donate')
    </a>
@stop

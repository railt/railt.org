<link rel="stylesheet" crossorigin="anonymous" @if(app('env') === 'production')
    integrity="{{ \integrity('dist/app.css', ['algorithms' => ['sha384']]) }}"
@endif href="{!! \mix('dist/app.css') !!}" />

<script async="async" crossorigin="anonymous" @if(app('env') === 'production')
    integrity="{{ \integrity('dist/app.js', ['algorithms' => ['sha384']]) }}"
@endif src="{!! \mix('dist/app.js') !!}"></script>

@extends('layout.master')

@section('title', $title)

@section('content')
    <app-error>
        <template slot="code">{{ $code }}</template>
        <template slot="description">
            @lang($description)
            <br /><a href="/">@lang('Go Home')</a>

            @if(app()->bound('sentry') && app('sentry')->getLastEventID())
                <br />
                <div class="subtitle">Error ID: {{ app('sentry')->getLastEventID() }}</div>
                <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>
                <script>
                    Raven.showReportDialog({
                        eventId: '{{ app('sentry')->getLastEventID() }}',
                        // use the public DSN (dont include your secret!)
                        dsn: 'http://6c9f242e16a64450816466a6cca8b204@railt.localhost:9000/1'
                    });
                </script>
            @endif
        </template>
    </app-error>
@stop

@section('footer', '')

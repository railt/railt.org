<meta charset="utf-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>@section('title')Home @show &mdash; Railt</title>
<meta name="keywords" content="@stack('keywords')" />
<meta name="description" content="@stack('description')" />
<meta name="theme-color" content="#65429a" />
<meta name="csrf-token" content="{{ \csrf_token() }}" />
{{-- <meta name="auth-token" content="{{ $token }}" /> --}}
@include('partials.assets')
@include('partials.prefetch')
@include('partials.icons')

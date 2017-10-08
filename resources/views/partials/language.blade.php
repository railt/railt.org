@section('lang')
    @foreach((array)$languages as $l => $title)
        <ui-option @if($l === $lang) :default="true" @endif
        value="{{ $l }}">{{ $title }}</ui-option>
    @endforeach
@stop

@extends('layout.master')

<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator|\App\Entity\Article[] $articles
 */
?>

@section('title', trans('Blog'))

@section('content')
    <app-blog>
        @foreach($articles as $article)
            {{ $article->getTitle() }}
            <br />
        @endforeach

        <hr />

        {!! $articles->toHtml() !!}
    </app-blog>
@stop

@extends('layout.master')

<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator|\App\Entity\Article[] $articles
 */
?>

@section('title', trans('Blog'))

@section('content')
    <app-blog>
        <template slot="articles">
            @foreach($articles as $article)
                <app-article>
                    <a href="{{ \route('blog.page', ['article' => $article->getUrn()]) }}" class="figure">
                        <img src="{{ $article->getPreview() }}" alt="{{ $article->getTitle() }}" />
                    </a>
                    <div class="article-content">
                        <h2>
                            <a href="{{ \route('blog.page', ['article' => $article->getUrn()]) }}">
                                {{ $article->getTitle() }}
                            </a>
                        </h2>
                        <br />
                        {{ $article->getPreviewText() }}
                    </div>
                </app-article>
            @endforeach

            <hr />

            {!! $articles->toHtml() !!}
        </template>
        <template slot="aside">
            <div class="panel">
                <br />
                <b>&nbsp;&nbsp;&nbsp;&nbsp;Aside</b>
                <br /><br />
            </div>
            <div class="panel">
                <br />
                <b>&nbsp;&nbsp;&nbsp;&nbsp;Aside</b>
                <br /><br />
            </div>
        </template>
    </app-blog>
@stop

@extends('app')

@section('content')
    <h1>文章列表</h1>
    <hr>
    @foreach ($articles as $article)
        <article>
            <a href="{{ action('ArticlesController@show',[$article->id]) }}">
				<h2> {{ $article->title }} </h2>
			</a>
            <div class="body">{{ $article->body }}</div>
        </article>
    @endforeach
@stop
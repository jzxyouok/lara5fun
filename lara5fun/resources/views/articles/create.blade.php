@extends('app')

@section('content')
	
	<h1>写一篇文章</h1>

	<hr>

	{!! Form::open(['action' => 'ArticlesController@store']) !!}
		@include('articles.form',['submitButtonText'=>'新增文章'])
	{!! Form::close() !!}

 	@include('errors.list')

@stop

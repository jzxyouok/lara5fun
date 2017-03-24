@extends('app')

@section('content')
	
	<h1>写一篇文章</h1>

	<hr>

	{!! Form::open(['action' => 'ArticlesController@store']) !!}
		<div class="form-group">
			{!! Form::label('title','标题:') !!}
			{!! Form::text('title',null, ['class'=> 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('body','内容:') !!}
			{!! Form::textarea('body',null, ['class'=> 'form-control'])!!}
		</div>

		<div class="form-group">
		    {!! Form::label('published_at','发表时间:') !!}
		    {!! Form::input('date','published_at',date('Y-m-d'), ['class'=> 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('新增文章',['class'=>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

@stop

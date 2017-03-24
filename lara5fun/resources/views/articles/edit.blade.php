@extends('app')

@section('content')
    
    <h1>编辑文章</h1>

    <hr>
    {!! Form::open(['action' => 'ArticlesController@store']) !!}
        @include('articles.form',['submitButtonText'=>'修改文章'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
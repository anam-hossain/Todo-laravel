@extends('layouts.application')

@section('content')

	 {{ Form::open(array('action' => 'TestController@newItem', 'class' => 'form-horizontal', 'files' => true)) }}

     	{{ Form::file('logo'); }}
     	<button type="submit">Upload</button>
	 {{Form::close()}}
@stop

@section('todo-form')
	<h1> Todos </h1>
@stop
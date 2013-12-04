@extends('layouts.application')

@section('content')

	<ul class="list-group">
		@foreach ($todos as $todo)
			<li class="list-group-item">
				{{ $todo->todo }}

				{{ Form::open(array('route' => array('todos.destroy', $todo->id), 'method' => 'delete','style' => 'display:inline;' , 'class' => 'pull-right')) }}
                    &nbsp;
                    <button type="submit" class="btn btn-primary  btn-xs" onclick = "return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></button>
                {{ Form::close() }}

                <button type="submit" class="btn btn-primary  btn-xs pull-right"><span class="glyphicon glyphicon-pencil"></span></button>
			</li>
		@endforeach
	</ul>
@stop

@section('todo-form')
	<h1> Todos </h1>
    @include('layouts._partials._form')
@stop
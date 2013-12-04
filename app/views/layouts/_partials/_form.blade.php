{{ Form::open(['route' => 'todos.store']) }}
    <div class="form-group">
        {{ Form::text('todo', null, ['placeholder' => 'what needs to be done?', 'class' => 'form-control' ]) }}
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
{{ Form::close() }}
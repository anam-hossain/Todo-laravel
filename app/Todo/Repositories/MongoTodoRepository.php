<?php namespace Todo\Repositories;
use TodoMongo;
use Input;
use Carbon;

class MongoTodoRepository implements TodoRepositoryInterface
{
	
	public function getAll()
	{
		$todos = TodoMongo::orderBy('created_at', 'desc')->get();

		$todos = $todos->each(function($todo) {
		    $todo->id = $todo->_id;
		});

		return $todos;
	}

	public function store()
	{
		$todo = New TodoMongo;
		$todo->todo 	= Input::get('todo');
		$todo->due 		= Carbon::now();
		$todo->save();
	}

	public function destroy($id)
	{
		$todo = TodoMongo::find($id);
		$todo->delete();

	}
}
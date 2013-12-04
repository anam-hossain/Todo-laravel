<?php namespace Todo\Repositories;
use Todo;
use Input;
use Carbon;

class MysqlTodoRepository implements TodoRepositoryInterface
{
	
	public function getAll()
	{
		return Todo::orderBy('created_at', 'desc')->get();
	}

	public function store()
	{
		$todo = New Todo;
		$todo->todo 	= Input::get('todo');
		$todo->due 		= Carbon::now();
		$todo->save();
	}

	public function destroy($id)
	{
		$todo = Todo::find($id);
		$todo->delete();

	}
}
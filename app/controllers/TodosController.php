<?php
use Todo\Repositories\TodoRepositoryInterface;

class TodosController extends BaseController
{
	
	protected $todo;

	/**
	 * [__construct description]
	 * @param DbTodosRepository $todo [description]
	 */
	public function __construct(TodoRepositoryInterface $todo)
	{
		$this->todo = $todo;
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		$title = "Todo Laravel - MongoDB";

		$todos = $this->todo->getAll();

		// dd(DB::connection()->getName());
		dd(DB::connection()->getConfig());




		return View::make('index', compact('title', 'todos'));
	}

	public function store()
	{
		$newTodo = $this->todo->store();

		return Redirect::route('todos.index');
	}

	public function destroy($id)
	{

		$todo = $this->todo->destroy($id);

		return Redirect::route('todos.index');
	}
}
<?php
use Todo\Repositories\TodoRepositoryInterface;

class TodosController extends BaseController
{
	
	protected $todo;

	/**
	 * [__construct description]
	 * @param DbTodosRepository $todo [description]
	 */
	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		//dd(Carbon::now()->subMonth());
		$title = "Todo Laravel";

		$todos = $this->todo->all();

		
		//$todos->forget(2);
		// $todos= $todos->find(6);
		// dd($todos);
		// dd(DB::connection()->getName());
		//dd(DB::connection()->getConfig());


		return View::make('index', compact('title', 'todos'));
	}

	public function show($id)
	{

		dd("executed");
	}

	public function store()
	{
		$newTodo = $this->todo->create(Input::only('todo'));

		return Redirect::route('home');
	}

	public function destroy($id)
	{

		// delete a chunk
		$todo = $this->todo->destroy($id);

		return Redirect::route('home');
	}

	public function todoBind(Todo $todo)
	{
		dd($todo);
	}
}
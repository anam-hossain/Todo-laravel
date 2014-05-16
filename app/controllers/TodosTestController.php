<?php 
class TodosTestController extends BaseController
{

	protected $tag;
	public function  __construct(Tag $tag)
	{
		$this->tag = $tag;
	}
	

	public function index()
	{

		$todos = Todo::with('tags')->get();

		dd($todos);
	}

	public function tags()
	{
		$tags = $this->tag->with('todo')->get();
		

		dd($tags);
	}

	public function store()
	{
		return Redirect::route('home')->with('flash_message', 'I am running from tags.store method');
	}
	
}
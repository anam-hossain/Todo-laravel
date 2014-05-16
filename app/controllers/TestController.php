<?php
class TestController extends BaseController 
{
	public function newItem()
	{
		
		dd("New item created");
	}

	public function newItemTwo()
	{
		
		dd("New item created");
	}

	public function post1(){
		echo "Post method 1";
		return Input::all();
	}

	public function post2(){
		return Input::old();
	}

}
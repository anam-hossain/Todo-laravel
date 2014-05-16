<?php
class Todo extends Eloquent
{
	protected $table = "todos";
	protected $connection = 'mysql';

	public function tags()
	{
		return $this->hasMany('Tag');
	}
}
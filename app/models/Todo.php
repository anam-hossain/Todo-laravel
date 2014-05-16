<?php
class Todo extends Eloquent
{
	protected $table = "todos";
	protected $connection = 'mysql';

	protected $guarded = ['id'];

	public function tags()
	{
		return $this->hasMany('Tag');
	}
}
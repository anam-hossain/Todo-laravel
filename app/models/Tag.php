<?php
class Tag extends Eloquent
{
	protected $table = "tags";
	protected $connection = 'mysql';


	public function todo()
	{
		return $this->belongsTo('Todo');
	}
}
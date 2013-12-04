<?php 
//use Jenssegers\Mongodb\Model as Eloquent;

class TodoMongo extends Moloquent 
{

    protected $connection = 'mongodb';

    protected $collection = 'todos';



}
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('Todo\Repositories\TodoRepositoryInterface', 'Todo\Repositories\MongoTodoRepository');

// App::bind('Todo\Repositories\TodoRepositoryInterface', 'Todo\Repositories\MysqlTodoRepository');


Route::get('/', ['as' => 'home', 'uses' => 'TodosController@index']);

Route::resource('todos', 'TodosController');
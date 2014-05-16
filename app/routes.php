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

//App::bind('Todo\Repositories\TodoRepositoryInterface', 'Todo\Repositories\MongoTodoRepository');

App::bind('Todo\Repositories\TodoRepositoryInterface', 'Todo\Repositories\MysqlTodoRepository');

Route::bind('title', function($value, $route) {
    return Todo::where('todo', 'LIKE', "%$value%")->first();
});

Route::get('login', 'UsersController@login');

Route::get('array-dot', function(){

  $array = array(
    'user1' => array('Miguel'),
    'user2' => array('Miguel', 'Borges', 'João'),
    'user3' => array(
        'Sara', 
        'Tiago' => array('Male')
    )

);

  $array2 = array_dot($array);
  dd($array2);
});

Route::get('country/{country}', array('before' => 'country', 'uses' => 'TodosController@index'));

Route::model('todoLarvel', 'Todo');

Route::get('/', ['as' => 'home', 'uses' => 'TodosController@index']);

//Route::resource('/', 'TodosController');

Route::post('todos', array('as' => 'todos.store', 'uses' => 'TodosController@store'));
Route::delete('todos/{id}', array('as' => 'todos.destroy', 'uses' => 'TodosController@destroy'));
Route::get('todo-laravel/{todoLarvel}', array('uses' => 'TodosController@todoBind'));
Route::get('todo/{title}', array('uses' => 'TodosController@todoBind'));

Route::get('tags/tags', ['as' => 'tags.tags', 'uses' => 'TodosTestController@tags']);
Route::resource('tags', 'TodosTestController');



/** Test Zone **/
Route::get('complex-join', function(){
    $todos = DB::table('todos')
        ->join('tags', function($join)
        {
            $date = date('Y-m-d');
            $join->on('todos.id', '=', 'tags.todo_id')
                 ->where('tags.created_at', '<', $date  );
        })
        ->get();
    return $todos;
    return DB::getQueryLog();
});

Route::get('file-upload', function(){
    return View::make('fileupload');
});

Route::post('new-upload', array('as' => 'new-item', 'uses' => 'TestController@newItem'));


Route::post('upload', array('as' => 'upload', function(){
   $file = Input::file('logo');
   $filename = time() . '-' . $file->getClientOriginalName(); 
   $file = $file->move('images/uploads',  $filename);

   // $todo = new Todo;
   // $todo->todo = $filename;

   return "<img src=/images/uploads/".  $filename . "  >";
}));

Route::get('form2', function() 
{
      return Form::open(array('url' => URL::to('post1'))).
             Form::text('name', null).
             Form::email('email', null).
             '<button type="submit" name="button1" value="1">submit</button>'.
             '<button type="submit" name="button2" value="2">submit2</button>'.
           Form::close();
   
});

Route::get('pagination', function(){
  $haversineSQL = 'id';
  $distance = 6;

//  $query = DB::table('todos')
//     ->select(DB::Raw($haversineSQL . ' as distance'))
//     ->having('distance', '<=', $distance);

// $perPage = 10;
// $curPage = Paginator::getCurrentPage(); // reads the query string, defaults to 1

// // clone the query to make 100% sure we don't have any overwriting
// $itemQuery = clone $query;
// $itemQuery->addSelect('todos.*');
// // this does the sql limit/offset needed to get the correct subset of items
// $items = $itemQuery->forPage($curPage, $perPage)->get();

// // manually run a query to select the total item count
// $totalResult = $query->addSelect('count(*) as count')->get();
// $totalItems = $totalResult[0]['count'];

// // make the paginator, which is the same as returned from paginate()
// $paginatedItems = Paginator::make($items, $totalItems, $perPage);


// dd($paginatedItems);

  // $tt =DB::table('todos')
  //   ->select(DB::raw($haversineSQL . ' as distance'))
  //   ->select(DB::raw('count(*) as totalItems'))
  //   ->having('distance', '<=', $distance)
  //   ->get();

  $todos = DB::table('todos')
    ->select('todos.*', DB::raw($haversineSQL . ' as distance'))
    ->having('distance', '<=', $distance)
    ->get();

    $perPage = 2;
    $totalItems = count($todos);
    $totalPages = ceil($totalItems / $perPage);

    $page = Input::get('page', 1);

    if ($page > $totalPages or $page < 1) {
        $page = 1;
    }
    
    $offset = ($page * $perPage) - $perPage;

    $todos = array_slice($todos, $offset, $perPage);

    $todos = Paginator::make($todos, $totalItems, $perPage);

  dd($todos);
});

Route::post('post1', array('before' => 'checkForm', 'uses' => 'TestController@post1'));

Route::get('post2', array('as' => 'post2', 'uses' => 'TestController@post2'));

Route::get('form3', function() 
{
      echo $abc= Str::slug("Laying Down the Law");
      echo str_replace("-", " ", $abc);;

      return Form::open(array('url' => URL::to('post3'))).
             Form::text('name', null).
             Form::email('email', null).
             '<button type="submit" name="button1" value="1">submit</button>'.
             '<button type="submit" name="button2" value="2">submit2</button>'.
           Form::close();
   
});
Route::post('post3', function() 
{
  $action = 'post1'; 
  return App::make('TestController')->$action(); 
});


Route::get('form', function() 
{
      return Form::open(array('url' => URL::to('post'))).
             Form::text('form[1][name]', null).
             Form::email('form[1][email]', null).
             '<button type="submit" name="button" value="1">submit</button>'.
           Form::close().

            Form::open(array('url' => URL::to('post'))).
              Form::text('form[2][name]', null).
              Form::email('form[2][email]', null).
              '<button type="submit" name="button" value="2">submit</button>'.
           Form::close();           
});

Route::post('post', function() 
{
    $input = Input::all();
    dd($input, $input['form'][$input['button']]['name']);

    $rules = [
            'name'   => 'required',
            'email'  => 'required'
    ];

    $validation = Validator::make($input['form'][$input['button']], $rules);

    return Redirect::back()->withInput();
});

Route::post('store-todo', function(){
   return Todo::create(Input::all());
});


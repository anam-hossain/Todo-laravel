<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>{{ isset($title)? $title : 'Todo Laravel' }}</title>

	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ asset('css/application.css') }}">
  	</head>

  	<body>

	    <div class="container">
	      	<div class="header">
		        <ul class="nav nav-pills pull-right">
		          <li class="active"><a href="{{URL::route('home') }}">Home</a></li>
		          <li><a href="#">About</a></li>
		          <li><a href="#">Contact</a></li>
		        </ul>
		        <h3 class="text-muted">{{ isset($title)? $title : 'Todo Laravel' }} </h3>
	      	</div>

			<div class="row marketing">

				 	@yield('todo-form')

				 	<p>&nbsp;</p>

				 	@yield('content')
			</div>

			<div class="footer">
				<p>&copy; todo-laravel.dev</p>
			</div>

	    </div> <!-- /container -->


	  	<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
  	</body>
</html>

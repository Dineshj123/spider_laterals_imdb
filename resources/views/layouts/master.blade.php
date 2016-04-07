<html>
<head>
	<title>Login|Register Page</title>
	<link rel="stylesheet" type="text/css" href="/imdb/public/css/stylesheet.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.dropdown{right:-1100px;top:10px;}
  </style>
</head>
<body>
	<div class="container">
		<ul class="nav nav-pills">
			@if(\Auth::check())
			<div class="dropdown">
    			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" >Your account
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
    			<li> Howdy, {{\Auth::user()->name}}</li>
      			<li>{{ link_to_route('logout','Logout') }}</li>
    			</ul>
  			</div>
			@else
			<li>
				{{ link_to_route('login','Login') }}
			</li>
			<li>
				{{ link_to_route('users.create','New User') }}
			</li>
			@endif
		</ul>
		@yield('content')
		
	</div>
</body>
</html>


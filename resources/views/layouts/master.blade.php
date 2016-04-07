<html>
<head>
	<title>Login|Register Page</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<ul class="nav nav-pills">
			@if(\Auth::check())
			<li>
				{{ link_to_route('logout','Logout') }}
			</li>
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

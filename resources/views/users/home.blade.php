@extends('layouts.master')

@section('content')
	<h3>Welcome {{ \Auth::user()->name }}</h3>
	@foreach(array_chunk($movies,3) as $row)
			<div class="row">
				@foreach($row as $movie)
					<div class="col-md-4">
					<h2>{{$movie->name}}</h2>
					<a href="movie/{{$movie->name}}"><img src="{{$movie->name}}.jpg"></a>
					<p>
						Average Rating : {{$movieavg[$movie->name]}}
					</p>
				</div>
				@endforeach
			</div>
		@endforeach
@endsection

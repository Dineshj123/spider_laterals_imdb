@extends('layouts.master')

@section('content')
	<h3>Lists Of movies :</h3>
	@foreach(array_chunk($movies,3) as $row)
			<div class="row">
				@foreach($row as $movie)
					<div class="col-md-4">
					<h2>{{$movie->name}}</h2>
					<a href="movie/{{$movie->name}}"><img src="{{$movie->name}}.jpg"></a>
					<p>
						Average Rating : 
						@if ($movieavg[$movie->name]!="Unrated Average")
							{{round($movieavg[$movie->name],2)}}
						@else
						{{$movieavg[$movie->name]}}
						@endif
					</p>
					<p>	
						Description : {{ $movie->description }}
					</p>
					<p>	
						Year Of release : {{ $movie->yearofrelease }}
					</p>
				</div>
				@endforeach
			</div>
		@endforeach
@endsection


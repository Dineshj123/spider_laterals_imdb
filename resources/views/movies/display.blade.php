@extends('layouts.master')
@section('content')
<h2>{{$moviename}}</h2>
<img src="/imdb/public/{{$moviename}}.jpg" alt="{{$moviename}}">
	<p>
		No. Of users voted for this movie : {{$moviecount}}
	</p>
	<p>
		Average rating of the movie is : {{$movieavg}}
	</p>
		Rate the movie here:
		<form method="POST" action="/imdb/public/moviereview">
			{{csrf_field()}}
      		<span class="starRating">
        	<input id="rating5" type="radio" name="rating" value="5" checked>
        	<label for="rating5">5</label>
        	<input id="rating4" type="radio" name="rating" value="4">
        	<label for="rating4">4</label>
        	<input id="rating3" type="radio" name="rating" value="3" >
        	<label for="rating3">3</label>
        	<input id="rating2" type="radio" name="rating" value="2">
        	<label for="rating2">2</label>
        	<input id="rating1" type="radio" name="rating" value="1">
        	<label for="rating1">1</label>
      		</span>
      		<input type="hidden" id="moviename" name="moviename" value="{{$moviename}}" />
      		<input type="submit" id="submit" value="submit">
     	</form>
     	<ul class="nav nav-pills">
     		<li>{{ link_to_route('home','Go Back to previous page') }}</li>
     	</ul>
@endsection

@extends('layouts.master')

@section('content')
	<h3>Welcome {{ \Auth::user()->name }}</h3>
@endsection
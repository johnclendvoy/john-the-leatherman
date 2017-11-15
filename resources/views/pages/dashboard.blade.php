@extends('layouts.public')

@section('title', 'ADMIN PANEL')

@section('content')

	<div class="container">

		@foreach($objects as $object)
			<a class="btn btn-default btn-lg" href="/{{$object}}/admin">{{$object}}</a>
		@endforeach
		<a class="pull-right btn btn-default btn-lg" href="/logout">logout</a>
	</div>
@stop

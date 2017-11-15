@extends('layouts.public')

@section('title', 'ADD PHOTOS')

@section('content')

	<div class="container">

		<div class="row">
		<h3>Adding Photos for: <b>{{$leather->name}}</b></h3>

			@foreach($leather->photos as $photo)
			<div class="col-sm-1">
				<img class="img img-respinsive" src="{{$photo->image('thumbnail_small')}}" alt="thumbnail for image {{ $photo->id }}" >

				<form class="inline" method="POST" action="/leather/{{ $photo->id }}/delete-photo">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE" >
					<button class="btn btn-default"><i class="fa fa-trash"></i></button>
				</form>
				<form class="inline" method="POST" action="/leather/{{ $leather->id }}/feature-photo/{{ $photo->id}}">
					{{csrf_field()}}
					<button class="btn btn-default"><i class="fa fa-{{$photo->id == $leather->feature_id ? 'star' : 'star-o'}}"></i></button>
				</form>
			</div>

			@endforeach

		</div>

		<div class="row">
			<form action="/leather/{{$leather->id}}/upload-photos"
			      class="dropzone"
			      id="my-awesome-dropzone">
			      {{csrf_field()}}
			</form>
		</div>

		<div class="row m-t-10">
			<a href="/leather/admin" class="btn btn-default">Done</a>
		</div>
	<div>

@stop

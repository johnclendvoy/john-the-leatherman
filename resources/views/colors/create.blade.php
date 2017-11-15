@extends('layouts.public')

@section('title', 'ADD/EDIT COLOR')

@section('content')

	<div class="container">

	@if(empty($color))
		<form method="POST" action="/colors" class="form" enctype="multipart/form-data">
	@else
		<form method="POST" action="/colors/{{ $color->id }}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
	@endif
		{{ csrf_field() }}

		@if(count($errors))
				<div class="form-group col-sm-12 bg-danger">
					<h4>Errors</h4>
					<ol>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ol>
				</div>
			@endif

			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="{{ !empty($color) ? $color->name : old('name') }}">
			</div>

			<div class="form-group">
				<label>Hexcode</label>
				<input class="form-control" type="color" name="hexcode" value="{{ !empty($color) ? $color->hexcode : old('hexcode') }}">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">{{ empty($color) ? 'Add' : 'Update' }}</button>
			</div>
		</form>
	</div>
@stop
@extends('layouts.public')
@section('title')
	{{empty($color) ? 'Add' : 'Edit'}} Color
@stop

@section('content')

	@component('components.title_row')
		@yield('title')
	@endcomponent

	@if(empty($color))
		<form method="POST" action="/colors" class="form" enctype="multipart/form-data">
	@else
		<form method="POST" action="/colors/{{ $color->id }}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
	@endif
			{{ csrf_field() }}

			@include('partials.form_errors')

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

@stop
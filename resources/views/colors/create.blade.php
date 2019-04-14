@extends('layouts.public')
@section('title')
	{{empty($color->id) ? 'Add' : 'Edit'}} Color
@stop

@section('content')

	@component('components.admin_form')
		@slot('route', 'colors')
		@slot('id', $color->id)

		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" value="{{ old('name', $color->name) }}">
		</div>

		<div class="form-group">
			<label>Hexcode</label>
			<input class="form-control" type="color" name="hexcode" value="{{ old('hexcode', $color->hexcode) }}">
		</div>

	@endcomponent

@stop
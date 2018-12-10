@extends('layouts.public')
@section('title')
	{{empty($category->id) ? 'Add' : 'Edit'}} Category
@stop

@section('content')

	@component('components.admin_form')
		@slot('route', 'categories')
		@slot('id', $category->id)

		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" value="{{ old('name', $category->name) }}">
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description" >{{ old('description', $category->description) }}</textarea>
		</div>

	@endcomponent
@stop
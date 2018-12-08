@extends('layouts.public')
@section('title')
	{{empty($category) ? 'Add' : 'Edit'}} Category
@stop

@section('content')

	@component('components.title_row')
		@yield('title')
	@endcomponent

	@if(empty($category))
		<form method="POST" action="/categories" class="form" enctype="multipart/form-data">
	@else
		<form method="POST" action="/categories/{{ $category->id }}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
	@endif
			{{ csrf_field() }}

			@include('partials.form_errors')

			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="{{ !empty($category) ? $category->name : old('name') }}">
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" >{{ !empty($category) ? $category->description : old('description') }}</textarea>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">{{ empty($category) ? 'Add' : 'Update' }}</button>
			</div>
		</form>
@stop
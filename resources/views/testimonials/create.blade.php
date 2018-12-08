@extends('layouts.public')

@section('title')
	{{empty($testimonial->id) ? 'Add' : 'Edit'}} Testimonial
@stop

@section('content')

	@component('components.title_row')
	@yield('title')
	@endcomponent

	@if(empty($testimonial->id))
		<form method="POST" action="/testimonials" class="form" enctype="multipart/form-data">
	@else
		<form method="POST" action="/testimonials/{{ $testimonial->id }}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
	@endif
			{{ csrf_field() }}

			@include('partials.form_errors')

			<div class="form-group">
				<label>Customer Name</label>
				<input class="form-control" type="text" name="name" value="{{ old('name', $testimonial->name) }}">
			</div>

			<div class="form-group">
				<label>Body</label>
				<textarea class="form-control" type="text" name="body">{{ old('body', $testimonial->body) }}</textarea>
			</div>

			<div class="form-group">
				<label>Leather</label>
				<select class="form-control" name="leather_id">
					<option value=''>-</option>
					@foreach($leathers as $leather)
						<option value="{{$leather->id}}"
						{{old('leather_id') == $leather->id || (!empty($testimonial->leather) && $testimonial->leather->id == $leather->id) ? 'selected' : '' }}
						>
							{{ $leather->name }} in {{$leather->color->name}}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<input type="hidden" name="active" value="0">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="active" value="1"
						{{ old('active', $testimonial->active) ? 'checked' : '' }}
						> Active
					</label>
				</div>
			</div>

			<div class="form-group">
				<label>Sort Order</label>
				<input class="form-control" type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">{{ empty($testimonial->id) ? 'Add' : 'Update' }}</button>
			</div>
		</form>

@stop
@extends('layouts.public')
@section('title')
	{{empty($leather->id) ? 'Add' : 'Edit'}} Leather Item
@stop

@section('content')

	@component('components.admin_form')
		@slot('route', 'leather')
		@slot('id', $leather->id)

		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" value="{{ old('name', $leather->name) }}">
		</div>

		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" type="text" name="description">{{ old('description', $leather->description) }}</textarea>
		</div>

		<div class="form-group">
			<label>Dimensions</label>
			<textarea class="form-control" type="text" name="dimensions">{{ old('dimensions', $leather->dimensions) }}</textarea>
		</div>

		<div class="form-group">
			<label>Category</label>
			<select class="form-control" name="category_id">
					<option value=''>-</option>
				@foreach($categories as $cat)
					<option value="{{$cat->id}}"
					{{old('category_id', $leather->category_id) == $cat->id ? 'selected' : '' }}
					>
						{{ $cat->name }}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Color</label>
			<select class="form-control" name="color_id">
					<option value=''>-</option>
				@foreach($colors as $color)
					<option value="{{$color->id}}"
					{{old('color') == $color->id || (!empty($leather->color) && $leather->color->id == $color->id) ? 'selected' : '' }}
					>
						{{ $color->name }}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label>Price</label>
			<input class="form-control" type="number" name="price" value="{{ old('price', $leather->price) }}">
		</div>
		
		<div class="form-group">
			<input type="hidden" name="available" value="0">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="available" value="1"
					{{ old('available', $leather->available) == '1' ? 'checked' : '' }}
					> Available
				</label>
			</div>
		</div>

		<div class="form-group">
			<input type="hidden" name="active" value="0">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="active" value="1"
					{{ old('active', $leather->active) == '1' ? 'checked' : '' }}
					> Active
				</label>
			</div>
		</div>

	@endcomponent

@stop
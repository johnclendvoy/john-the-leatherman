@extends('layouts.public')

@section('title', 'ADD/EDIT LEATHER ITEM')

@section('content')

	<div class="container">

	@if(empty($leather))
		<form method="POST" action="/leather" class="form" enctype="multipart/form-data">
	@else
		<form method="POST" action="/leather/{{ $leather->id }}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
	@endif
		{{ csrf_field() }}

		@include('partials.form_errors')


			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" value="{{ !empty($leather) ? $leather->name : old('name') }}">
			</div>


			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" type="text" name="description">{{ !empty($leather) ? $leather->description : old('description') }}</textarea>
			</div>

			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category_id">
						<option value=''>-</option>
					@foreach($categories as $cat)
						<option value="{{$cat->id}}"
						{{old('category_id') == $cat->id || (!empty($leather) && $leather->category->id == $cat->id) ? 'selected' : '' }}
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
						{{old('color') == $color->id || (!empty($leather) && $leather->color->id == $color->id) ? 'selected' : '' }}
						>
							{{ $color->name }}
						</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Price</label>
				<input class="form-control" type="number" name="price" value="{{ !empty($leather) ? $leather->price : old('price') }}">
			</div>

{{-- 			<div class="form-group">
				<label>Main Image</label>
				<input class="form-control" type="file" name="image" accept="image/*">
			</div>
 --}}
			<div class="form-group">
				<input type="hidden" name="available" value="0">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="available" value="1"
						{{ !empty($leather) && $leather->available == '1' ? 'checked' : '' }}
						{{ empty($leather) && old('available') == '1' ? 'checked' : '' }}
						> Available
					</label>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" name="active" value="0">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="active" value="1"
						{{ !empty($leather) && $leather->active == '1' ? 'checked' : '' }}
						{{ empty($leather) && old('active') == '1' ? 'checked' : '' }}
						> Active
					</label>
				</div>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">{{ empty($leather) ? 'Add Photos' : 'Update' }}</button>
			</div>
			
		</form>

	</div>
@stop
@extends('layouts.public')

@section('title', 'ALL LEATHER ITEMS')

@section('content')

	<div class="container">
	<a href="/leather/create" class="btn btn-success">Add New Item</a>

		<table class="table">
			<thead>
				<th>Main Image</th>
				<th>Name</th>
				<th>Category</th>
				<th>Color</th>
				<th>Price</th>
				<th>Active</th>

				<th>View</th>
				<th>Photos</th>
				<th>Edit</th>
				<th>Delete</th>

			</thead>
			<tbody>
				@foreach($leathers as $leather)
					<tr>
						<td><img src="{{$leather->image('thumbnail_small')}}" ></td>
						<td>{{ $leather->name }}</td>
						<td>{{ $leather->category->name }}</td>
						<td><span class="color-swatch" style="background-color:{{ $leather->color->hexcode }}"></span></td>
						<td>{{ $leather->price }}</td>
						<td>{{ $leather->active == '1' ? 'Yes' : 'No' }}</td>

						<td><a class="btn btn-default" href="/leather/{{ $leather->id }}">View</a></td>
						<td><a class="btn btn-default" href="/leather/{{ $leather->id }}/add-photos">Photos</a></td>
						<td><a class="btn btn-default" href="/leather/{{ $leather->id }}/edit">Edit</a></td>
						<td>
							@component('components.delete_button')
							/leather/{{ $leather->id }}
							@endcomponent
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
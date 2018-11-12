@extends('layouts.public')

@section('title', 'All Leather Items')

@section('content')

<div class="row mt20">
	<div class="col-sm-12">
		<a href="/leather/create" class="btn btn-primary square"><i class="fa fa-plus"></i> Add New Item</a>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="table table-responsive table-striped">
			<thead>
				<th>Main Image</th>
				<th>Name</th>
				<th>Category</th>
				<th>Color</th>
				<th>Price</th>
				<th>Active</th>
				<th>Available</th>

				<th>Actions</th>
				<th>Delete</th>

			</thead>
			<tbody>
				@foreach($leathers as $leather)
					<tr>
						<td><img src="{{$leather->image('thumbnail_small')}}" ></td>
						<td><a href="{{$leather->url}}">{{ $leather->name }}</a></td>
						<td>{{ $leather->category->name }}</td>
						<td><span class="color-swatch" style="background-color:{{ $leather->color->hexcode }}"></span></td>
						<td>{{ $leather->price }}</td>

						<td><span class="badge badge-{{$leather->active ? 'success' : 'danger' }}">{{$leather->active ? 'Active' : 'Hidden' }}</span></td>
						<td><span class="badge badge-{{$leather->available ? 'success' : 'danger' }}">{{$leather->available ? 'Available' : 'Sold' }}</span></td>

						<td>
							<a class="btn btn-sm btn-secondary square" href="/leather/{{ $leather->id }}/add-photos"><i class="fa fa-camera"></i></a>
							<a class="btn btn-sm btn-secondary square" href="/leather/{{ $leather->id }}/edit"><i class="fa fa-pencil"></i></a>
						</td>

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
</div>

@stop
@extends('layouts.public')
@section('title', 'All Categories')

@section('content')

	@component('components.admin_table')
		@slot('route', 'categories')
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>

			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td><a class="btn btn-secondary square" href="/categories/{{ $category->id }}/edit"><i class="fa fa-pencil"></i></a></td>
						<td>
							@component('components.delete_button')
								/categories/{{ $category->id }}
							@endcomponent
						</td>
					</tr>
				@endforeach
			</tbody>
	@endcomponent
@stop
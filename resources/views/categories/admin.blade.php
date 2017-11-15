@extends('layouts.public')

@section('title', 'ALL CATEGORIES')

@section('content')

	<div class="container">
	<a href="/categories/create" class="btn btn-success">Add New Item</a>

		<table class="table">
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

						<td><a class="btn btn-default" href="/categories/{{ $category->id }}/edit">Edit</a></td>
						<td>
							<form method="POST" action="/categories/{{ $category->id }}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE" >
								<button class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
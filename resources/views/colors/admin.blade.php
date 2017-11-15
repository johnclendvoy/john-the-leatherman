@extends('layouts.public')

@section('title', 'All Colors')

@section('content')

	<div class="container">
	<a href="/colors/create" class="btn btn-success">Add New Item</a>

		<table class="table">
			<thead>
				<th>name</th>
				<th>slug</th>
				<th>color</th>

				<th>Edit</th>
				<th>Delete</th>

			</thead>
			<tbody>
				@foreach($colors as $color)
					<tr>
						<td>{{ $color->name }}</td>
						<td>{{ $color->slug }}</td>
						<td>{{ $color->hexcode }}<span class="color-swatch" style="background-color:{{$color->hexcode}}"></span></td>

						<td><a class="btn btn-default" href="/colors/{{ $color->id }}/edit">Edit</a></td>
						<td>
							@component('components.delete_button')
								/colors/{{ $color->id }}
							@endcomponent
							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
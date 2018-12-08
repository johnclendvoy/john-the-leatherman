@extends('layouts.public')
@section('title', 'All Colors')

@section('content')

	@component('components.admin_table')
		@slot('route', 'colors')
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
					<td><span class="color-swatch" style="background-color:{{$color->hexcode}}"></span> {{$color->hexcode }}</td>
					<td><a class="btn btn-secondary square" href="/colors/{{ $color->id }}/edit"><i class="fa fa-pencil"></i></a></td>
					<td>
						@component('components.delete_button')
							/colors/{{ $color->id }}
						@endcomponent
					</td>
				</tr>
			@endforeach
		</tbody>
	@endcomponent

@stop
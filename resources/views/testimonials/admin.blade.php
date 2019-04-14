@extends('layouts.public')
@section('title', 'All Testimonials')

@section('content')

@component('components.title_row')
	@slot('title')
		@yield('title')
	@endslot
@endcomponent

<div class="row mt20">
	<div class="col-sm-12">
		<a href="/testimonials/create" class="btn btn-primary square"><i class="fa fa-plus"></i> Add New Item</a>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<th>Id</th>
					<th>Order</th>
					<th>Name</th>
					<th>Body</th>
					<th>Leather</th>
					<th>Active</th>

					<th>Actions</th>
					<th>Delete</th>

				</thead>
				<tbody>
					@foreach($testimonials as $testimonial)
						<tr>
							<td>{{ $testimonial->id }}</td>
							<td>{{ $testimonial->sort_order }}</td>
							<td>{{ $testimonial->name }}</td>
							<td>{{ str_limit($testimonial->body, 20) }}</td>

							<td>
								@if(empty($testimonial->leather))
								none
								@else
								<a href="{{$testimonial->leather->url}}">{{ $testimonial->leather->name }}</a>
								@endif
							</td>

							<td><span class="badge badge-{{$testimonial->active ? 'success' : 'danger' }}">{{$testimonial->active ? 'Active' : 'Hidden' }}</span></td>

							<td>
								<a class="btn btn-sm btn-secondary square" href="/testimonials/{{ $testimonial->id }}/edit"><i class="fa fa-pencil"></i></a>
							</td>

							<td>
								@component('components.delete_button')
								/testimonials/{{ $testimonial->id }}
								@endcomponent
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>
</div>

@stop
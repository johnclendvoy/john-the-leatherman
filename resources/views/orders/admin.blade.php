@extends('layouts.public')
@section('title','All Orders')

@section('content')

	@component('components.title_row')
		@yield('title')
	@endcomponent

	<div class="row">
		<div class="col-sm-12">

			<table class="table table-responsive">
				<thead>
					<th>Created</th>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Notes</th>

					<th>Total</th>
					<th>Items</th>
					<th>Shipped</th>

					<th>Actions</th>
				</thead>
				<tbody>
					@foreach($orders as $order)
						<tr>
							<td>{{ $order->created_at }}</td>
							<td>{{ $order->name }}</td>
							<td>{{ $order->email }}</td>
							<td>{{ $order->address }}</td>
							<td>{{ $order->phone }}</td>
							<td>{{ $order->notes }}</td>
							<td>{{ $order->total_dollars }}</td>
							<td>
								<ul>
								@foreach($order->leathers as $leather)
									<li>{{ $leather->name }}</li>
								@endforeach
								</ul>
							</td>

							<td>
								@if($order->shipped)
								<span class="badge badge-success">Yes</span>
								@else
								<span class="badge badge-danger">No</span>
								@endif
							</td>

							<td>
								<a href="/orders/{{$order->id}}/edit">Edit</a>
								@component('components.delete_button')
								/orders/{{ $order->id }}
								@endcomponent
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
@stop
@extends('layouts.public')
@section('title','All Orders')

@section('content')

	@component('components.admin_table')
		@slot('route', 'orders')
		<thead>
			<th>ID</th>
			<th>Created</th>
			<th>Name</th>
			<th>Total</th>
			<th>Items</th>
			<th>Shipped</th>

			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->created_at }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->total_dollars }}</td>
					<td>
						<ul>
						@foreach($order->leathers as $leather)
							<li>{{ $leather->name }} (#{{$leather->id}})</li>
						@endforeach
						</ul>
					</td>

					<td>
						<span class="badge badge-{{$order->shipped_at ? 'success' : 'danger' }}">{{$order->shipped_at ? 'Yes' : 'No' }}</span>

					</td>

					<td>
						<a class="btn btn-sm btn-secondary square" href="/orders/{{ $order->id }}/edit"><i class="fa fa-pencil"></i></a>
					</td>

					<td>
						@component('components.delete_button')
						/orders/{{ $order->id }}
						@endcomponent
					</td>
				</tr>
			@endforeach
		</tbody>
	@endcomponent
@stop
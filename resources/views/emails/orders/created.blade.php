<h3>Order Received!</h3>
<p>Order from johntheleatherman.com!</p>

<p>The order contains:</p>

<ul>
	@foreach($order->leathers as $leather)
	<li>{{$leather->color->name}} {{$leather->name}} (id: {{$leather->id}}) - ${{$leather->price}}</li>
	@endforeach
</ul>

<p>
	Subtotal: {{$order->subtotal_dollars}}<br>
	Tax: {{$order->tax_dollars}}<br>
	<b>Total: {{$order->total_dollars}}</b>
</p>

<h3>Customer Info</h3>

<p>{{$order->name}}</p>
<p>{{$order->email}}</p>
<p>{{$order->address}}</p>

<p>{{$order->phone ?? 'no phone given'}}</p>
<p>{{$order->notes ?? 'no special notes'}}</p>


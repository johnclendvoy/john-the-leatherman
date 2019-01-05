<h3>Order Received!</h3>
<p>Order from johntheleatherman.com!</p>

<p><a href="{{$order->url}}">View Order #{{$order->id}}</a></p>

<p>The order contains:</p>

<ul>
	@foreach($order->leathers as $leather)
	<li>{{$leather->name}} in {{$leather->color->name}} (<a href="{{url($leather->url)}}">#{{$leather->id}}</a>) - ${{$leather->price}}</li>
	@endforeach
</ul>

<p>
	Subtotal: {{$order->subtotal_dollars}}<br>
	Tax: {{$order->tax_dollars}}<br>
	<b>Total: {{$order->total_dollars}}</b>
</p>

<h3>Customer Info</h3>
<p>
	{{$order->name}}<br>
	{{$order->email}}<br>
	{{$order->phone ?? 'no phone given'}}
</p>
<p>
	{{$order->address}}<br>
	{{$order->city}}, {{$order->province}}<br>
	{{$order->postal_code}}
</p>
<p>{{$order->notes ?? 'no special notes'}}</p>


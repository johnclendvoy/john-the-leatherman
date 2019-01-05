<h3>Order Shipped!</h3>

<p>Your order has been shipped! It was packed up and put in the mail on {{$order->shipped_at->format('l F jS, Y')}}.</p>

<p>These items were shipped to you at the following address:</p>

<ul>
	@foreach($order->leathers as $leather)
	<li>{{$leather->name}} in {{$leather->color->name}}</li>
	@endforeach
</ul>

<p>
{{$order->name}}<br>
{{$order->address}}<br>
{{$order->city}}, {{$order->province }}<br>
{{$order->postal_code}}
</p>

<p>Thanks again for your purchase.</p>

<p>- John The Leatherman</p>


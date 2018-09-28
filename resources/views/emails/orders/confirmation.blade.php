<h3>Order Received!</h3>

<p>Thank you for placing your order!</p>
<p>Your order contains:</p>

<ul>
	@foreach($order->leathers as $leather)
	<li>{{$leather->color->name}} {{$leather->name}} - ${{$leather->price}}</li>
	@endforeach
</ul>

<p>
	Subtotal: ${{$order->subtotal_dollars}}<br>
	Tax: ${{$order->tax_dollars}}<br>
	<b>Total: ${{$order->total_dollars}}</b>
</p>

<p>These items will be shipped to you at the following address:</p>
<p>{{$order->address}}</p>
<p>I will send you another email to let you know that your order was sent in the mail. If any of this information is incorrect, or if you have any questions, please contact me as soon as possible at <a href="mailto:{{config('app.email')}}">{{config('app.email')}}</a> or <a href="{{url('/contact')}}">{{url('/contact')}}</a>.</p>

<p>Thanks again for your purchase.</p>

<p>- John The Leatherman</p>


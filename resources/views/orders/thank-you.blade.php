@extends('layouts.public')
@section('title', 'Thank you!')

@section('content')
	@component('components.title_row')
		Thank you!
		@slot('icon', 'svg.like')
	@endcomponent

	<div class="row">
		<div class="col">
			<p>Your order has been placed and your card has been charged. I will get those items together and ship them out really soon! You should recieve an email shortly with more information. I will also send another message once the order has been shipped.</p>
			<p>If you want to keep in touch, feel free to follow me on <a href="http://instagram.com/johntheleatherman">Instagram</a> or <a href="http://fb.com/johntheleatherman">Facebook</a> to see what I've been working on.</p>
			<p>Thanks again for your purchase!</p>
			<p class="h4 pull-right">- John The Leatherman</p>

		</div>
	</div>
@stop
@extends('layouts.public')
@section('title', 'terms')

@section('content')
	@component('components.title_row')
		Terms and Conditions
		@slot('icon', 'svg.pen')
	@endcomponent

	<div class="row">
		<div class="col-sm-12">

			<h3>Custom Sizing</h3>
			<p>The items you see on this website are one of a kind, and therefore have a size that can not be modified. If you are interested in purchasing an item, but require an adjustment to the size, do not purchase the item without first contacting John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a>. Do not assume that I can customize the size or fit of any item in the store. There is a high probability that I will be able to alter an item or build a new one to suit your needs, but I need to know what those needs are.</p>

			<h3>Shipping</h3>
			<p>If the items are already made, within 3 business days, you can expect the items to be shipped. If you would like to upgrade your shipping method, or have a prefered delivery service, please contact John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a> on the same day that the order was made. Special shipping requests will be at the purchasers expense on top of the cost of the rest of the order.</p>

			<h3>Returns</h3>
			<p>John The Leatherman does not accept returns, the items are sold as is and may contain flaws due to the materials used or human error. John The Leatherman will try his best to create a high quality, long lasting product, but is not reponsible for providing a flawless product.</p>
			
		</div>
	</div>
	
@stop

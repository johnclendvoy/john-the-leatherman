@extends('layouts.public')
@section('title', 'terms')

@section('content')
	@component('components.title_row')
		Terms and Conditions
		@slot('icon', 'svg.pen')
	@endcomponent

	<div class="row">
		<div class="col-sm-12">

			<h3>Custom Orders</h3>
			<p>Many items you will see on this website are not available for purchase, this could mean one of two things. 1. The item(s)have been custom made specifically for a customer and are only on the website to showcase in my portfolio. 2. The item was once available on the store and was purchased by a customer online. If you see an item that is unavailable online, but you are interested in purchasing it, please contact John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a>. You should also contact John The Leatherman if you are interested in an item you did not see on this website. John The Leatherman will let you know if it is possible, and offer a quote if you wish to proceed with the custom commissioned piece.</p>

			<h3>Custom Sizing</h3>
			<p>The items you see on this website are one of a kind, and therefore have a size that can not be easily modified. If you are interested in purchasing an item, but require an adjustment to the size, do not purchase the item without first contacting John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a>. Do not assume that I can customize the size or fit of any item in the store. There is a high probability that I will be able to alter an item or build a new one to suit your needs, but I need to know what those needs are.</p>

			<h3>Purchases</h3>
			<p>This website uses <a href="//stripe.com">Stripe</a> to process credit card information. At no point does your credit card information touch John The Leatherman's servers. It is not inspected or stored. The information is encrypted and send directly to Stripe making the checkout process secure.</p>
			<p>The items are sold to the first customer who creates an order containing that item. There is a possiblility that an item in your shopping bag will be purchased by another customer and no longer available by the time you are finished your checkout process. This is an unfortunate scenario, however, you will not be charged and you must contact me to have another item custom made.</p>

			<h3>Shipping</h3>
			<p>It is the customer's responsibility to ensure the shipping address is filled in correctly before the purchase is made. If there was a mistake made during the checkout process, contact John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a> and let him know about any changes that need to be made.</p>
			<p>If the items are already made, within 5 business days, you can expect the items to be shipped. I will send an email once the order is in the mail. If you notice any different If you would like to request a shipping method please contact John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a> right after the order was made. Special shipping requests will be at the purchasers expense on top of the cost of the rest of the order.</p>

			<h3>Returns</h3>
			<p>John The Leatherman does not accept return or refunds at this time. The items are sold as is. John The Leatherman will try his best to create a high quality, long lasting product, but is not reponsible for providing a flawless product. If you are unsatisfied with your purchase, please contact John The Leatherman via the <a href="/contact">contact form</a> or send an email to <a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a> and I will do my best to help you.</p>

			<h3>Privacy</h3>
			<p>John The Leatherman does save the information about your order (name, email address, physical address, phone number, etc.), but does not share it with any other parties. The website uses cookies and session storage to keep your contact information in the system to improve the experience of the checkout process.</p>

			<h3>Contact</h3>
			<p>
				John C. Lendvoy<br>
				27 8th Street SE<br>
				Medicine Hat, Alberta<br>
				Canada, T1A1K9<br>
				1-306-631-5348<br>
				<a href="mailto:johntheleatherman@gmail.com">johntheleatherman@gmail.com</a><br>
				<a href="/">johntheleatherman.com</a><br>
			</p>
		</div>
	</div>
	
@stop

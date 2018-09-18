@extends('layouts.public')

@section('title', 'Pay for Order')

@section('content')

	@component('components.title_row')
	Checkout
	@slot('icon', 'svg.wallet')
	@endcomponent
					
	<div class="row">
		<div class="col-md-4 mb30">
			<h3>Shopping Bag</h3>
			<ul>
				@foreach(Cart::items() as $leather)
				<li>{{$leather->name}} - ${{$leather->price}}</li>
				@endforeach
			</ul>
			<p>
				Subtotal: ${{ Cart::subtotal() }} <br>
				Tax: ${{ Cart::tax() }} <br>
				<span class="h4">Total: ${{ cart::total() }} </span>
			</p>
			<small><a class="text-md-grey" href="/bag">&#9664; Edit Shopping Bag</a></small>
		</div>

		<div class="col-md-4 mb30">
			<h3>Shipping Details</h4>
			<p>
				<i class="fa fa-fw fa-id-card-o"></i> {{session('customer.name')}}<br>
				<i class="fa fa-fw fa-envelope-o"></i> {{session('customer.email')}}<br>
				@if(session('customer.phone'))
				 <i class="fa fa-fw fa-phone"></i> {{session('customer.phone')}}<br>
				@endif
				<i class="fa fa-fw fa-map-marker"></i> {{session('customer.address')}}<br>
			</p>

			@if(session('customer.notes'))
			<p>Notes: {{session('customer.notes')}}</p>
			@endif
			<small><a class="text-md-grey" href="/shipping-details">&#9664; Edit Shipping Details</a></small>
		</div>

		<div class="col-md-4">
			<h3>Finish Checkout</h4>
			<p>If the information on this page looks correct, proceed with your payment by clicking the button below.</p>

			<form action="/orders" method="POST">
				{{csrf_field()}}

				@include('partials.form_errors')
				
			  	<script
				    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				    data-key="{{config('services.stripe.key')}}"
				    data-amount="{{Cart::total_cents()}}"
				    data-name="John The Leatherman"
				    data-description="Checkout"
				    data-email="{{session('customer.email')}}"
				    data-image="/apple-touch-icon-180x180.png"
				    data-locale="auto"
				    data-zip-code="false">
			  	</script>
			  	<img src="/images/stripe/powered_by_stripe_solid.png">
			</form>
		</div>

	</div>
@stop
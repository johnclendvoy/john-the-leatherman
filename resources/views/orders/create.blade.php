@extends('layouts.public')

@section('title', 'Pay for Order')

@section('content')

	@component('components.title_row')
		@slot('title', 'Checkout')
		@slot('icon', 'svg.wallet')
	@endcomponent
					
	<div class="row">
		<div class="col-md-6 col-lg-4 mb30">
			<h4>Shopping Bag</h4>
			<ul>
				@foreach(Cart::items() as $leather)
				<li>{{$leather->name}} : ${{$leather->price}}</li>
				@endforeach
			</ul>
			<div>
				Subtotal: ${{ Cart::subtotal() }} <br>
				Tax: ${{ Cart::tax() }}<br>
				<strong class="h5">Total: ${{ cart::total() }} </strong>
			</div>
			<small><a class="text-md-grey" href="/bag"><i class="fa fa-fw fa-chevron-left"></i> Edit Shopping Bag</a></small>
		</div>

		<div class="col-md-6 col-lg-4 mb30">
			<div class="row mb30">
				<div class="col-12">
					<h4>Contact Info</h4>
					<div>
						<i class="fa fa-fw fa-id-card-o"></i> {{session('customer.name')}}<br>
						<i class="fa fa-fw fa-envelope-o"></i> {{session('customer.email')}}<br>
						@if(session('customer.phone'))
						 <i class="fa fa-fw fa-phone"></i> {{session('customer.phone')}}<br>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h4>Mailing Address</h4>
					<div>
						{{session('customer.address')}}<br>
						{{session('customer.city')}}<br>
						{{session('customer.postal_code')}}
					</div>

					@if(session('customer.notes'))
					<div>Notes: {{session('customer.notes')}}</div>
					@endif
					<small><a class="text-md-grey" href="/shipping-details"><i class="fa fa-fw fa-chevron-left"></i> Edit Shipping Details</a></small>
				</div>
			</div>
		</div>

		<div class="col-md-12 col-lg-4">
			<h4>Finish Checkout</h4>
				@if(Cart::empty())
				<p>Your shopping bag is empty! You need to add at least one item before you can make an order.</p>
				@else
				<p>If the information on this page is correct, proceed with your payment by clicking the button below.</p>
				@endif

			<form action="/orders" method="POST">
				{{csrf_field()}}

				@include('partials.form_errors')
				
				@if(Cart::empty())
			  		<small><a class="text-md-grey" href="/leather"><i class="fa fa-fw fa-chevron-left"></i>Add To Shopping Bag</a></small>
			  	@else
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
			  	@endif
			</form>
		</div>

	</div>
@stop
@extends('layouts.public')

@section('title', 'Pay for Order')

@section('content')

	@component('components.title_row')
		@slot('title', 'Checkout')
		@slot('icon', 'svg.wallet')
	@endcomponent
					
	<div class="row">


		<div class="col-md-12 col-lg-6 mb30">
			<div class="box">
				<h4 class="mb30">Contact Info</h4>
				<div class="mb10">
					<div class="mb10">Name <span class="font-2 pull-right">{{session('customer.name')}}</span></div>
					<div class="mb10">Email <span class="font-2 pull-right">{{session('customer.email')}}</span></div>
					@if(session('customer.phone'))
					<div class="mb10">Phone <span class="font-2 pull-right">{{session('customer.phone')}}</span></div>
					@endif
 				</div>
 				<hr>
				<div class="row mb10">
					<div class="col-12">
						<h5 class="mb20">Ship To:</h5>
					</div>
					<div class="col-12 col-md-8 col-lg-12 offset-md-2 offset-lg-0">
						<address class="font-2 text-center address">
							<div>{{session('customer.name')}}</div>
							<div>{{session('customer.address')}}</div>
							<div>{{session('customer.city')}}, {{session('customer.province')}}</div>
							<div>{{session('customer.postal_code')}}</div>
						</address>
					</div>
				</div>
				@if(session('customer.notes'))
					<div class="">Special Notes</div>
					<div class="mb30">
						<div class="font-2">{{session('customer.notes')}}</div>
					</div>
				@endif
				@component('components.back_button')
					@slot('title', 'Edit Shipping Details')
					@slot('link', '/shipping-details')
				@endcomponent
			</div>
		</div>

		<div class="col-md-12 col-lg-6 mb30">
			<div class="row mb30">
				<div class="col-12">
					<div class="box">
						<h4 class="mb30">Shopping Bag</h4>
						<div class="mb30">
							@foreach(Cart::items() as $leather)
							<div class="mb10">{!! $leather->swatch() !!} {{$leather->name}} <span class="dollar pull-right">${{$leather->dollars}}</span></div>
							@endforeach
						</div>
						<div class="mb20">
							<div class="mb10">Subtotal <span class="dollar pull-right">${{ Cart::subtotal() }}</span></div>
							<div class="mb10">Tax<span class="dollar pull-right">${{ Cart::tax() }}</span></div>
							<hr>
							<h4>Total <span class="dollar pull-right">${{ Cart::total() }}</span></h4>
						</div>
						@component('components.back_button')
							@slot('title', 'Edit Shopping Bag')
							@slot('link', '/bag')
						@endcomponent
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="box">
						<h4 class="mb30">Finish Checkout</h4>
						@if(Cart::empty())
						<p class="mb30">Your shopping bag is empty! You need to add at least one item before you can make an order.</p>
						@component('components.back_button')
							@slot('title', 'Add To Shopping Bag')
							@slot('link', '/leather')
						@endcomponent
						@else
						<p>If the information on this page is correct, proceed with your payment by clicking the button below.</p>
						<form action="/orders" method="POST">
							{{csrf_field()}}
							@include('partials.form_errors')

						  	<div class="text-center">
							  	{{-- <script
								    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								    data-key="{{config('services.stripe.key')}}"
								    data-amount="{{Cart::total_cents()}}"
								    data-name="John The Leatherman"
								    data-description="Checkout"
								    data-email="{{session('customer.email')}}"
								    data-image="/apple-touch-icon-180x180.png"
								    data-locale="auto"
								    data-zip-code="false">
							  	</script> --}}
							    <script>
							        // Hide default stripe button
							        // document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
							    </script>
								{{-- <button type="submit" class="btn btn-primary square" disabled>Pay With Card</button> --}}
								<button type="submit" class="btn btn-primary square" disabled>Unavailable</button>
                                <p>Please contact me via email to place an order.</p>
								<div>
						  			<img src="/images/stripe/powered_by_stripe_solid.png">
								</div>
							</div>
						</form>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
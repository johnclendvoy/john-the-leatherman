@extends('layouts.public')
@section('title', 'Shopping Bag')
@section('content')

	@component('components.title_row')
		@slot('title', 'Shopping Bag')
		@slot('icon', 'svg.shopping-bag')
	@endcomponent

	@if(Cart::items()->count())
	<h4 class="mb10">Items In Your Bag</h4>
	@endif

	<div class="row">

		<div class=" col-sm-12 col-md-6 col-lg-8">
			@forelse(Cart::items() as $leather)
			<div id="cart-item-{{$leather->id}}" class="container">
				<div class="row mb30 border-bottom checkout-item">
					<div class="col-md-4 col-sm-6 pl0">
						<a href="{{$leather->url}}">
							<img class="img img-fluid" src="{{$leather->image('thumbnail')}}" alt="{{$leather->name}}">
						</a>
					</div>
					<div class="col-md-8 col-sm-6 mt20 mb20">
						<h3>{{$leather->name}} </h3>
						<h4>${{$leather->price}}</h4>
						<p>
							<span class="color-swatch" style="background-color:{{ $leather->color->hexcode }}"></span> {{$leather->color->name}}
						</p>
						<form id="remove-from-cart-form" action="/bag" method="post">
							{{csrf_field()}}
							<input type="hidden" name="leather_id" value="{{$leather->id}}">
							<small><a class="cursor-pointer remove-from-cart text-md-grey"><i class="fa fa-times"></i> Remove from bag</a></small>
						</form>

					</div>
				</div>
			</div>
			@empty
			<p>There are no items in your bag.</p>
			@endforelse

			<div class="mb20">
				<a class="btn btn-secondary square" href="/leather">Continue Shopping</a>
			</div>

		</div>

		{{-- checkout details --}}
		@if(Cart::items()->count())
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="container">
					<div class="row border-bottom checkout">
						<div class="col-sm-12">
							{{-- <h2>Checkout</h2> --}}
							<p>Subtotal: <span class="pull-right">${{ Cart::subtotal() }}</span></p>
							<p>Tax: <span class="pull-right">${{ Cart::tax() }}</span></p>
							<h4>Total: <span class="pull-right">${{ Cart::total() }}</span></h4>
						</div>

						<div class="col-sm-12 text-center mt20">
							<a href="/shipping-details" class="btn btn-primary square">Checkout</a><br>
							<img src="/images/stripe/powered_by_stripe_solid.png">
						</div>
						</div>
					</div>
				</div>
			</div>
		@endif

	</div>

@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.remove-from-cart').click(function(){
				var id = $('#remove-from-cart-form').submit();
			});
		});
	</script>
@stop
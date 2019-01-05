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
				<div class="row mb30 box">
					<div class="col-3 col-sm-6 col-md-4 pl0">
						<a href="{{$leather->url}}">
							<img class="img img-fluid" src="{{$leather->image('thumbnail')}}" alt="{{$leather->name}}">
						</a>
					</div>
					<div class="col-9 col-sm-6 col-md-8 mt20 mb20">
						<h4>{{$leather->name}} </h4>
						<h5 class="dollar">${{$leather->price}}</h5>
						<p>
							{!! $leather->swatch() !!} {{$leather->color->name}}
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
					<div class="row box">
						<div class="col-sm-12 mb20">
							<div class="mb10">Subtotal <span class="dollar pull-right">${{ Cart::subtotal() }}</span></div>
							<div class="mb10">Tax<span class="dollar pull-right">${{ Cart::tax() }}</span></div>
							<hr>
							<h4>Total <span class="dollar pull-right">${{ Cart::total() }}</span></h4>
						</div>

						<div class="col-sm-12 text-center">
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
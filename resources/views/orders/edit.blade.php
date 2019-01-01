@extends('layouts.public')
@section('title','Edit Order')

@section('content')

	@component('components.title_row')
		@slot('title')
			Edit Order #{{$order->id}}
		@endslot
	@endcomponent

	<div class="row">

		{{-- LEFT SIDE --}}
		<div class="col-sm-12 col-md-4">
			<p>Created {{$order->created_at->format('g:iA, F jS, Y')}}<br>
				<small class="text-muted">{{ $order->created_at->diffForHumans()}} </small>
			</p>

			@foreach($order->leathers as $leather)
			<div id="cart-item-{{$leather->id}}" class="container">
				<div class="row mb30 border-bottom checkout-item">
					<div class="col-md-4 col-sm-6 pl0">
						<a href="{{$leather->url}}">
							<img class="img img-fluid" src="{{$leather->image('thumbnail')}}" alt="{{$leather->name}}">
						</a>
					</div>
					<div class="col-md-8 col-sm-6 mt20 mb20">
						<h4>{{$leather->name}} </h4>
						<h5>${{$leather->price}}<span class=" badge badge-secondary pull-right">#{{$leather->id}}</span></h5>
						<p>
							<span class="color-swatch" style="background-color:{{ $leather->color->hexcode }}"></span> {{$leather->color->name}}
						</p>
					</div>
				</div>
			</div>
			@endforeach

			<div class="container">
				<div class="row border-bottom checkout">
					<div class="col-sm-12">
						{{-- <h2>Checkout</h2> --}}
						<p>Subtotal: <span class="pull-right">${{ $order->subtotal_dollars }}</span></p>
						<p>Tax: <span class="pull-right">${{ $order->tax_dollars }}</span></p>
						<h4>Total: <span class="pull-right">${{ $order->total_dollars }}</span></h4>

						<small>Stripe ID: <span class="pull-right">${{ $order->stripe_id }}</span></small>
					</div>

					{{-- <div class="col-sm-12 text-center mt20"> --}}
						{{-- <a href="/shipping-details" class="btn btn-primary square">Checkout</a><br> --}}
						{{-- <img src="/images/stripe/powered_by_stripe_solid.png"> --}}
					{{-- </div> --}}
				</div>
			</div>
		</div>
		
		{{-- RIGHT SIDE --}}
		<div class="col-sm-12 col-md-8">
			
			<form method="POST" action="/orders/{{$order->id}}">
				{{method_field('PATCH')}}
				{{ csrf_field() }}

				@include('partials.form_errors')

				<div class="row">
					<div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Customer Name</label>
						<input required name="name" type="text" class="form-control" value="{{ old('name', $order->name) }}">
					</div>
					<div class="form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email Address</label>
						<input required name="email" type="email" class="form-control rect" value="{{ old('email', $order->email) }}">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 {{ $errors->has('address') ? 'has-error' : '' }}">
						<label>Street Address / Box Number</label>
						<input required name="address" type="text" class="form-control" value="{{ old('address', $order->address) }}">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-sm-6 {{ $errors->has('city') ? 'has-error' : '' }}">
						<label>City</label>
						<input required name="city" type="text" class="form-control" value="{{ old('city', $order->city) }}">
					</div>

					<div class="form-group col-sm-6 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
						<label>Postal Code / Zip Code</label>
						<input required name="postal_code" type="text" class="form-control" value="{{ old('postal_code', $order->postal_code) }}">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-12 {{ $errors->has('phone') ? 'has-error' : '' }}">
						<label>Phone Number <span class="text-muted">(optional)</span></label>
						<input name="phone" type="text" class="form-control" value="{{ old('phone', $order->phone) }}">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 {{ $errors->has('notes') ? 'has-error' : '' }}">
						<label>Special Notes <span class="text-muted">(optional)</span></label>
						<textarea name="notes" class="form-control rect" >{{ old('notes', $order->notes) }}</textarea>
					</div>
				</div>

				<div class="row form-group">

					<div class="col-sm-12 {{ $errors->has('shipped_at') ? 'has-error' : '' }}">
						<label>Shipped At </label>
						<input class="form-control rect" type="date" name="shipped_at" value="@if(old('shipped_at')){{old('shipped_at')}}@elseif($order->shipped_at){{$order->shipped_at->format('Y-m-d')}}@endif">
					</div>

					<div class="col-sm-12 {{ $errors->has('send_shipped_email') ? 'has-error' : '' }}">
						<label>
							<input type="checkbox" name="send_shipped_email" value="1" {{ old('send_shipped_email') ? 'checked="checked"' : '' }}>
							Send Shipped Notification Email
						</label>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary square"><i class="fa fa-save"></i> Save Order</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop
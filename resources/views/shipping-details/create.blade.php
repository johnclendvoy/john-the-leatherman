@extends('layouts.public')
@section('title', 'Shipping Details')

@section('content')

	<div id="contact" class="container">
		@component('components.title_row')
			@slot('title', 'Shipping Details')
			@slot('icon', 'svg.package')
		@endcomponent

		<div class="row">

			<div class="col-12 col-lg-8 offset-lg-2">
				<p>Please provide your shipping information below. Enter your real shipping address as well as a valid email address, so I can send you your items and email you a reciept. You will be asked for credit card information on the next page.</p>
			</div>

			<div class="col-12 col-lg-8 offset-lg-2">
			
				<form method="POST" action="/shipping-details">
					{{ csrf_field() }}
					{!! app('captcha')->render() !!}

					@include('partials.form_errors')

					<div class="row">
						<div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
							<label>Your Name</label>
							<input required name="name" type="text" class="form-control" value="{{ old('name', session('customer.name')) }}">
						</div>
						<div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
							<label>Email Address</label>
							<input required name="email" type="email" class="form-control rect" value="{{ old('email', session('customer.email')) }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 {{ $errors->has('address') ? 'has-error' : '' }}">
							<label>Street Address / Box Number</label>
							<input required name="address" type="text" class="form-control" value="{{ old('address', session('customer.address')) }}">
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-sm-8 {{ $errors->has('city') ? 'has-error' : '' }}">
							<label>City</label>
							<input required name="city" type="text" class="form-control" value="{{ old('city', session('customer.city')) }}">
						</div>

						<div class="form-group col-sm-4 {{ $errors->has('province') ? 'has-error' : '' }}">
							<label>Province / State</label>
							<input required name="province" type="text" class="form-control" value="{{ old('province', session('customer.province')) }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-6 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
							<label>Postal Code / Zip Code</label>
							<input required name="postal_code" type="text" class="form-control" value="{{ old('postal_code', session('customer.postal_code')) }}">
						</div>
						<div class="form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
							<label>Phone Number <span class="text-muted">(optional)</span></label>
							<input name="phone" type="text" class="form-control" value="{{ old('phone', session('customer.phone')) }}">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12 {{ $errors->has('notes') ? 'has-error' : '' }}">
							<label>Special Notes <span class="text-muted">(optional)</span></label>
							<textarea name="notes" class="form-control rect" >{{ old('notes', session('customer.notes')) }}</textarea>
						</div>
					</div>
					
					<div class="row form-group">
						<div class="col-sm-12 text-center">
							<button name="send" type="submit" class="btn btn-primary square">Continue Checkout</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('[fancy-box]').fancybox({
			titleShow: true
		})
	});
</script>
@stop

@extends('layouts.public')
@section('title', 'Shipping Details')

@section('content')

	<div id="contact" class="container">
		@component('components.title_row')
			Shipping Details
			@slot('icon', 'svg.package')
		@endcomponent

		<div class="row">

			<div class="col-sm-12 col-md-8 offset-md-2">
				<p>Please provide your shipping information below. Enter your real shipping address as well as a valid email address, so I can send you your items and email you a reciept. Leave your phone nuber if you want just in case I have difficulty shipping to the address you provided. You will be asked for credit card information on the next page.</p>
			</div>

			<div class="col-sm-12 col-md-8 offset-md-2">
			
				<form method="POST" action="/shipping-details">
					{{ csrf_field() }}
					{!! app('captcha')->render() !!}

					@include('partials.form_errors')

					<div class="row form-group">
						<div class="mt10 col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
							<label>Your Name</label>
							<input required name="name" type="text" class="form-control" value="{{ old('name', session('customer.name')) }}">
						</div>
						<div class="mt10 col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
							<label>Email Address</label>
							<input required name="email" type="email" class="form-control rect" value="{{ old('email', session('customer.email')) }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 {{ $errors->has('address') ? 'has-error' : '' }}">
							<label>Physical Shipping Address</label>
							<textarea required name="address" type="text" class="form-control">{{ old('address', session('customer.address')) }}</textarea>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 {{ $errors->has('phone') ? 'has-error' : '' }}">
							<label>Phone Number <span class="text-muted">(optional)</span></label>
							<input required name="phone" type="text" class="form-control" value="{{ old('phone', session('customer.phone')) }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 {{ $errors->has('notes') ? 'has-error' : '' }}">
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

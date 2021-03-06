@extends('layouts.public')
@section('title', 'Contact')

@section('content')

	@component('components.title_row')
		@slot('title', 'Contact John')
		@slot('icon', 'svg.chat')
	@endcomponent

	<div class="row">

		<div class="col-sm-12 col-lg-6">
			<p>Do you have any questions or comments about my work? Would like to request a custom leather item? Are you having issues with the website? Let me know by filling out this form.</p>
		</div>

		<div class="col-sm-12 col-lg-6">
		
			<form method="POST" action="/contact">
				{{ csrf_field() }}
				{!! app('captcha')->render() !!}

				@include('partials.form_errors')

				<div class="row">
					<div class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Your Name</label>
						<input required name="name" type="text" class="form-control" value="{{ old('name') }}">
					</div>
					<div class="col-sm-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email Address</label>
						<input required name="email" type="email" class="form-control" value="{{ old('email') }}">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 {{ $errors->has('comments') ? 'has-error' : '' }}">
						<label>Your Message</label>
						<textarea required name="comments" rows="4" class="form-control">{{ old('comments') }}</textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button name="send" type="submit" class="btn btn-primary square" >Send Message</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	@component('components.title_row')
		@slot('title', "Let's Get Social")
		@slot('icon', 'svg.nodes')
	@endcomponent

	<div class="row">
		<div class="col-md-3 offset-md-2 text-center mt20">
			@include('svg.instagram', ['height' => '60px'])
		</div>
		<div class="col-md-7 text-center text-md-left">
			<h4 class="mt20">Instagram Account</h4>
			<p class="mt10 text-muted"><a target="_blank" href="http://instagram.com/johntheleatherman">@johntheleatherman</a></p>

		</div>
	</div>

	<div class="row">
		<div class="col-md-3 offset-md-2 text-center mt20">
			@include('svg.facebook', ['height' => '60px'])
		</div>
		<div class="col-md-7 text-center text-md-left">
			<h4 class="mt20">Facebook Page</h4>
			<p class="mt10 text-muted"><a target="_blank"href="http://fb.com/johntheleatherman">facebook.com/johntheleatherman</a></p>
		</div>
	</div>

@stop

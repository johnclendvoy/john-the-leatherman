@extends('layouts.public')

@section('title', 'Products')

@section('content')
	@component('components.title_row')
		@slot('title','Product Gallery')
		@slot('icon', 'svg.leather')
	@endcomponent

	@include('partials.leathernav')
	
	@include('partials.leathergrid')

	@component('components.title_row')
		@slot('title', 'Suggestions')
		@slot('icon', 'svg.speech-bubble')
		<p class="text-center">Didn't find what you were looking for? Let me know what you were hoping to see. I will let you know if I ever make something inspired by your idea!</p>
	@endcomponent

	<div class="row">
		<div class="col-sm-12">
			<form action="/suggestions" method="POST">
				{{ csrf_field() }}
				{!! app('captcha')->render() !!}

				@include('partials.form_errors')

				<div class="row">
					<div class="col-12 col-sm-6 col-md-4 col-lg-5 form-group">
						<input required class="form-control inout-lg" type="text" name="comments" value="{{old('comments')}}" placeholder="Your Suggestion">
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-lg-4 form-group">
						<input required class="form-control inout-lg" type="email" name="email" value="{{old('email')}}" placeholder="Email Address">
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-3 form-group">
						<button id="suggestion-button" class="form-control btn btn-primary square">Send Suggestion</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop

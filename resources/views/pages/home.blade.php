@extends('layouts.public')

@section('banner')
<div class="home-banner text-center">
	<div class="home-banner-text">
		<div class="home-title">John</div>
		<div class="home-subtitle">- The -</div>
		<div class="home-title">Leatherman</div>
	</div>
</div>
@stop

@section('content')

	@component('components.title_row')
		@slot('title', $feature_title)
	@endcomponent

	@include('partials.leathergrid', ['leathers' => $leathers])

	@component('components.cta_button')
		@slot('link', '/leather')
		@slot('text', 'Browse Leather')
	@endcomponent

	@component('components.title_row')
		@slot('title', 'The Process')
	@endcomponent

	<div class="row">
		<div class="col-md-4 text-center mt20">
			@include('svg.design', ['height' => '100px'])
			<h4 class="mt20">Original Designs</h4>
			<p class="mt10 text-dk-grey">Each design begins its life as an original sketch.</p>
		</div>

		<div class="col-md-4 text-center mt20">
			@include('svg.handmade', ['height' => '100px'])
			<h4 class="mt20">Hand Crafted</h4>
			<p class="mt10 text-dk-grey">My work is made with care using only hand tools.</p>
		</div>

		<div class="col-md-4 text-center mt20">
			@include('svg.unique', ['height' => '100px'])
			<h4 class="mt20">Unique Products</h4>
			 <p class="mt10 text-dk-grey">Every thing I make is one-of-a-kind.</p>
		</div>
	</div>

	@component('components.cta_button')
		@slot('link', '/about')
		@slot('text', 'Learn More')
	@endcomponent

	@unless(empty($testimonials))

		@component('components.title_row')
			@slot('title', 'Testimonials')
			@slot('icon', 'svg.heart-bubble')
		@endcomponent

		<div class="row">
			<div class="col-12 text-center">
			@foreach($testimonials as $testimonial)
			<div class="row box mb30">
				<div class="col-12 mb20">
					<p class="text-dk-grey">"{{$testimonial->body}}"</p>
				</div>
				<div class="col-6 text-right">
					<a href="{{$testimonial->leather->url}}">
						<img class="img img-fluid rounded-circle" src="{{$testimonial->leather->image('thumbnail_small')}}">
					</a>
				</div>
				<div class="col-6 text-left">
					<h5 class="mt10">{{$testimonial->name}}</h5>
					<p>Owner of <a href="{{$testimonial->leather->url}}"> {{$testimonial->leather->name}}</a></p>
				</div>
			</div>
			@endforeach
			</div>
		</div>
	@endunless
	
@stop

@extends('layouts.public')

@section('title')
{{$leather->name}}
@stop

@section('content')

	@include('partials.leathernav')

	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 text-center">
				<h1 class="mt0">{{$leather->name}}</h1>
			</div>
		</div>


		{{-- large photo --}}
		<div class="row">
			<div class="col-sm-12 col-md-8 offset-md-2">

				<div class="slider-for-{{ $leather->slider_class }}">

					@if(!empty($leather->featurePhoto))
					<div>
						<a class="fancybox cursor-zoom-in" rel="group" href="{{ $leather->image('full') }}">
							<img class="img img-fluid" src="{{ $leather->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
						</a>
					</div>
					@endif

					@foreach($leather->photos as $photo)
						@if(empty($leather->featurePhoto) || $photo->id != $leather->featurePhoto->id)
						<div>
							<a data-fancybox="gallery" href="{{ $photo->image('full') }}">
								<img class="img img-fluid" src="{{ $photo->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
							</a>
						</div>
						@endif
					@endforeach

				</div>
			</div>
		</div>

		{{-- small photos --}}
		@if(count($leather->photos))
			<div class="row">
				<div class="col-sm-12">
					<div class="slider-nav-{{ $leather->slider_class }}">

						{{-- show the feature image first --}}
						@if(!empty($leather->featurePhoto))
						<div>
							<img class="img img-fluid" src="{{ $leather->image('thumbnail') }}" alt="A smaller picture of {{ $leather->name }}" title="A smaller picture of {{ $leather->name }}">
						</div>
						@endif

						@foreach($leather->photos as $photo)
							@if(empty($leather->featurePhoto) || $photo->id != $leather->featurePhoto->id)
							<div>
								<img class="img img-fluid" src="{{ $photo->image('thumbnail') }}" alt="A smaller picture of {{ $leather->name }}" title="A smaller picture of {{ $leather->name }}">
							</div>
							@endif
						@endforeach
						
					</div>
				</div>
			</div>
		@endif

		<div class="row mt40">
			<div class="col-sm-12 col-md-8">
				<h3>Description</h3>
				<p>{{$leather->description}}</p>
			</div>
			@if(!empty($leather->dimensions))
				<div class="col-sm-12 col-md-4">
					<h3>Dimensions</h3>
					<p>{{$leather->dimensions}}</p>
				</div>
			@endif

			{{--}}
			@if($leather->available)
			<div class="col-sm-12 text-center">
				<span class="h1 price">${{$leather->price}}</span>
				<a class="btn btn-secondary btn-lg square">Add To Cart</a>
				<p>{{$leather->dimensions}}</p>
			</div>
			@endif
			--}}
		</div>

		<div class="row text-center">
			<div class="col-sm-12">
				<h4>
					@if(Auth::check())
					<a href="/leather/{{$leather->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="/leather/{{$leather->id}}/add-photos"><span class="glyphicon glyphicon-picture"></span></a>
					@endif
					{{-- {{ $leather->name }} --}}
				</h4>
			</div>

		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 text-center">
				<h1>Similar Items</h1>
			</div>
		</div>

		@include('partials.leathergrid')
			
	</div>

@stop

@section('js')
	<script src="/js/sliders.js"></script>
@stop



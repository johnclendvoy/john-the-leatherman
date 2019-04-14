@extends('layouts.public')

@section('title')
{{$leather->name}}
@stop

@section('content')

	@component('components.title_row')
		@slot('title', $leather->name)
		@slot('icon', 'svg.leather')
	@endcomponent

	<div class="row">
		<div class="col-lg-6 mb20">

			{{-- large photo --}}
			<div class="row">
				<div class="col-sm-12">
					<div class="slider-for-{{ $leather->slider_class }}">
						@if(!empty($leather->featurePhoto))
						<div>
							<a data-fancybox="gallery" class="cursor-zoom-in" href="{{ $leather->image('full') }}">
								<img class="img img-fluid" src="{{ $leather->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
							</a>
						</div>
						@endif
						@foreach($leather->photos as $photo)
							@if(empty($leather->featurePhoto) || $photo->id != $leather->featurePhoto->id)
							<div>
								<a data-fancybox="gallery" class="cursor-zoom-in" href="{{ $photo->image('full') }}">
									<img class="img img-fluid" src="{{ $photo->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
								</a>
							</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
			{{-- end large photo --}}

			{{-- small photos --}}
			@if(count($leather->photos))
				<div class="row">
					<div class="col-10 offset-1">
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
			{{-- end small photos --}}
		</div>

		<div class="col-lg-6">

			<h3>Description</h3>
			<p>{{$leather->description}}</p>
			@if($leather->available)
			<p>This one-of-a-kind item was handmade with care by John. Once it is sold, there may never be another one just like it.</p>
			@else
			<p>This one-of-a-kind item has found its way to a happy customer. If you are interested in something like this, please <a href="/contact">contact me</a> about building you another one.</p>
			@endif

			@if(!empty($leather->dimensions))
				<h3>Dimensions</h3>
				<p>{{$leather->dimensions}}</p>
			@endif

			<h3>Colour</h3>
			<p><a href="/leather?color={{$leather->color->slug}}"><span class="color-swatch" style="background-color:{{$leather->color->hexcode}}"></span></a>{{$leather->color->name}}</p>

			@include('partials.buy-now-button')


{{-- 			@auth
			<a class="btn btn-secondary square" href="/leather/{{$leather->id}}/edit"><i class="fa fa-pencil"></i></a>
			<a class="btn btn-secondary square" href="/leather/{{$leather->id}}/add-photos"><i class="fa fa-camera"></i></a>
			@endauth
 --}}
		</div>
	</div>


	<div class="row text-center">
		<div class="col-sm-12">
			<h4>
			</h4>
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 text-center">
			<h1>Similar Items</h1>
		</div>
	</div>

	@include('partials.leathergrid')
	
@stop

@section('js')
	<script src="/js/sliders.js"></script>
@stop



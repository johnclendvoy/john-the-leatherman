@extends('layouts.public')

@section('title', 'JOHN THE LEATHERMAN')

@section('content')

	@include('partials.leathernav')

	<div class="container">

			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-push-2">
					<div class="slider-for-{{ $leather->slider_class }}">

						@if(!empty($leather->featurePhoto))
						<div>
							<a class="fancybox cursor-zoom-in" rel="group" href="{{ $leather->image('full') }}">
								<img class="img img-responsive" src="{{ $leather->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
							</a>
						</div>
						@endif

						@foreach($leather->photos as $photo)

						@if($leather->feature_id != $photo->id)
						<div>
							<a class="fancybox" rel="group" href="{{ $photo->image('full') }}">
								<img class="img img-responsive" src="{{ $photo->image('feature')}}" alt="A larger picture of {{ $leather->name }}" title="A larger picture of {{ $leather->name }}">
							</a>
						</div>
						@else
						
						@endif
						@endforeach

					</div>
				</div>
			</div>

			@if(count($leather->photos))
				<div class="row">
					<div class="col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3">
						<div class="slider-nav-{{ $leather->slider_class }}">

							{{-- show the feature image first --}}
							@if(!empty($leather->featurePhoto))
							<div>
								<img class="img img-responsive" src="{{ $leather->image('thumbnail') }}" alt="A smaller picture of {{ $leather->name }}" title="A smaller picture of {{ $leather->name }}">
							</div>
							@endif

							@foreach($leather->photos as $photo)

							@if($leather->feature_id != $photo->id)
								<div>
									<img class="img img-responsive" src="{{ $photo->image('thumbnail') }}" alt="A smaller picture of {{ $leather->name }}" title="A smaller picture of {{ $leather->name }}">
								</div>
							@endif

							@endforeach
							
						</div>
					</div>
				</div>
			@endif

			<div class="row text-center">
				<h4>
					@if(Auth::check())
					<a href="/leather/{{$leather->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="/leather/{{$leather->id}}/add-photos"><span class="glyphicon glyphicon-picture"></span></a>
					@endif
					{{ $leather->name }}
				</h4>

				<p>{{ $leather->description }}</p>
			</div>
			
	</div>

@stop

@section('js')
	<script src="/js/sliders.js"></script>
@stop



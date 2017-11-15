@extends('layouts.public')

@section('title', 'All Products')

@section('content')

	@include('partials.leathernav')

	<div class="container">
		<div class="row">
			@forelse ($leathers as $leather)
				<div class="col-xs-6 col-sm-3 col-sm-push-0 extra-margin leather-image">
					<a href="/leather/{{ $leather->id }}">
						<img class="img img-responsive" src="{{ $leather->image('thumbnail') }}" alt="A picture of {{ $leather->name }}">
					</a>
				</div>
			@empty
			<div class="col-xs-12">
				<p>No items match your search.</p>
			</div>

			@endforelse
		</div>
	</div>
@stop



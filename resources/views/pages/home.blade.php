@extends('layouts.public')

@section('content')
	<div class="container">
		@component('components.title_row')
			Product Gallery
			@slot('icon', 'svg.leather')
		@endcomponent
		@include('partials.leathernav')
		@include('partials.leathergrid')
	</div>
@stop

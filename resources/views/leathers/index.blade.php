@extends('layouts.public')

@section('title', 'Products')

@section('content')
	@component('components.title_row')
		Product Gallery
		@slot('icon', 'svg.leather')
	@endcomponent
	@include('partials.leathernav')
	@include('partials.leathergrid')
@stop



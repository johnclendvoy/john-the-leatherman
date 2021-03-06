@extends('layouts.public')
@section('title', 'Admin Dashboard')

@section('content')

	@component('components.title_row')
		@slot('title', 'Admin Dashboard')
	@endcomponent

	@php
		$objects = [
			'leather',
			'categories',
			'colors',
			'testimonials',
			'orders',
		];
	@endphp

	@foreach($objects as $object)
		<a class="btn btn-default btn-lg" href="/{{$object}}/admin">{{$object}}</a>
	@endforeach
	<a class="pull-right btn btn-default btn-lg" href="/logout">logout</a>
@stop

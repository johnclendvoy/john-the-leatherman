@extends('layouts.public')
@section('title', 'Credits')

@section('content')
	@component('components.title_row')
		Credits
		@slot('icon', 'svg.like')
	@endcomponent

	<h3>Website</h3>
	<p>This website was developed using <a href="https://laravel.com">Laravel</a> by <a href="http://johnclendvoy.ca">John C. Lendvoy</a>.</p>

	<h3>Icons</h3>
	<p>Icons made by <a href="https://www.flaticon.com/authors/freepik">Freepik</a> and <a href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a> from <a href="https://flaticon.com ">www.flaticon.com </a></p>
@stop

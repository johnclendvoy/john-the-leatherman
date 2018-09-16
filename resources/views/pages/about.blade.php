@extends('layouts.public')
@section('title', 'About')

@section('content')

	<div class="container">

		@component('components.title_row')
			About John
			@slot('icon', 'svg.avatar')
		@endcomponent

		<div class="row">

			@if(\Session::pull('mail_sent'))
			<div class="col-sm-12 alert alert-success text-center">
				<h5>Message Received</h5>
				<p>Thank you for the message! I will get back to you as soon as I can.</p>
			</div>
			@endif

			<div class="col-sm-12">
				<p>John C. Lendvoy is an artist from Moose Jaw, Saskatchewan, Canada. About {{Carbon::createFromFormat('Y-m-d', '2010-06-01')->diffForHumans() }}, after buying a do-it-yourself shoe kit from <a href="https://www.youtube.com/watch?v=dHSVYJPXcvw">Simple Shoes</a>, he found himself with some of the basic skills needed for leathercraft. Between classes and wrestling tournaments at the University of Regina, he was always able to find some time to hone his craft, slowly accumulating tools and techniques to elevate his work to the next level.</p>

				<p>Each item John has ever made is uniquely one-of-a-kind. That means carefully measured, cut, tooled, stitched, and finished by hand. John makes sure everything he creates is done with the maximum amount of quality and attention to detail. He makes leather products that are functional and durable, while also being a unique piece of artwork.</p>

				<p>John The Leatherman is currently based in Medicine Hat, Alberta, Canada, but would be willing to work with you on your own piece wherever you are in the world!</p>
			</div>
		</div>


		<div class="row mt40">
			@php
				$pics = [
					['desc' => 'Some of my works at Park Art in Moose Jaw, Sk' , 'link' => '/images/about/park-art-table.jpg'],
					['desc' => 'John The Leatherman at Park Art in Moose Jaw, Sk.' , 'link' => '/images/about/john-at-park-art.jpg'],
					['desc' => 'John The Leatherman at Brooks Medieval Faire, Ab.' , 'link' => '/images/about/brooks-tent.jpg'],
					['desc' => 'My Desk after a few projects' , 'link' => '/images/about/desk.jpg'],
				];
			@endphp

			@foreach($pics as $p)
			<div class="col-xs-6 col-sm-6 col-md-3 leather-item">
				<a data-fancybox="gallery" href="{{$p['link']}}">
					<img class="img img-fluid" src="{{$p['link']}}" title="{{$p['desc']}}" alt="{{$p['desc']}}"/>
				</a>
			</div>
			@endforeach
		</div>

		<div class="row mt40 text-center">
			<div class="col-sm-12 col-md-8 offset-md-2">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="//www.youtube.com/embed/hh_Cv2wHVzo"></iframe>
				</div>
				<p>Learn a little more by watching this video from 2012 made by Shaw T.V.</p>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('[fancy-box]').fancybox({
				titleShow: true
			})
		});
	</script>
@stop

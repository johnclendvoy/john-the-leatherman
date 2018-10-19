@extends('layouts.public')
@section('title', 'About')

@section('content')

	@component('components.title_row')
		About John
		@slot('icon', 'svg.avatar')
	@endcomponent

	<div class="row">

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

	@component('components.title_row')
		The Process
		{{-- @slot('icon', 'svg.') --}}
	@endcomponent

	<div class="row">
		<div class="col-md-3 text-center mt20">
			@include('svg.design', ['height' => '100px'])
		</div>
		<div class="col-md-9 text-center text-md-left">
			<h4 class="mt20">Original Designs</h4>
			<p class="mt10 text-muted">Every design you see on this site started its life as lead from a pencil. I don't trace patterns from books or online, nor do I copy work from other artists. Using leather as a canvas, I am able to preserve my artwork into something that will last a lifetime.</p>
		</div>

	</div>

	<div class="row">
		<div class="col-md-3 text-center mt20">
			@include('svg.handmade', ['height' => '100px'])
		</div>
		<div class="col-md-9 text-center text-md-left">
			<h4 class="mt20">Hand Crafted</h4>
			<p class="mt10 text-muted">After the peice has been designed, the leather is measured and cut to size with a blade, the pattern is then tooled onto the leather by hand. The stain is applied and and edges are hand burnished. The position of every stitch is carefully planned, pre-punched, then placed with care. There are no machines involved in this process.</p>

		</div>
	</div>

	<div class="row">
		<div class="col-md-3 text-center mt20">
			@include('svg.unique', ['height' => '100px'])
		</div>
		<div class="col-md-9 text-center text-md-left">
			<h4 class="mt20">Unique Products</h4>
			<p class="mt10 text-muted">Because of the individualized construction process, every piece I make is the first and last of its kind. Even if I tried to replicate a piece, it will always be a little unique in its own way.</p>
		</div>
	</div>

	@component('components.cta-button')
		@slot('text', 'Browse Products')
		@slot('link', '/leather')
	@endcomponent

	
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

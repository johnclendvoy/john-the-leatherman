@extends('layouts.public')
@section('title', 'About')

@section('content')

	@component('components.title_row')
		@slot('title', 'About John')
		@slot('icon', 'svg.avatar')
	@endcomponent

	<div class="row">

		<div class="col-sm-12">
			<p>John C. Lendvoy is an artist from Moose Jaw, Saskatchewan, Canada. About {{Carbon::createFromFormat('Y-m-d', '2010-06-01')->diffForHumans() }}, after buying a do-it-yourself shoe kit from <a href="https://www.youtube.com/watch?v=dHSVYJPXcvw">Simple Shoes</a>, he found himself with some of the basic skills needed for leathercraft. Between classes and wrestling tournaments at the University of Regina, he was always able to find some time to hone his craft, slowly accumulating tools and techniques to elevate his work to the next level.</p>

			<p>Each item John has ever made is uniquely one-of-a-kind. That means carefully measured, cut, tooled, stitched, and finished by hand. John makes sure everything he creates is done with the maximum amount of quality and attention to detail. He makes leather products that are functional and durable, while also being a unique piece of artwork.</p>

			<p>John The Leatherman is currently based in Medicine Hat, Alberta, Canada, but would be willing to work with you on your own piece wherever you are in the world!</p>
		</div>
	</div>

	@php
		$pics = [
			['desc' => 'John The Leatherman at Park Art in Moose Jaw, Sk.' , 'link' => '/images/about/john-at-park-art.jpg'],
			['desc' => 'Some of my works at Park Art in Moose Jaw, Sk.' , 'link' => '/images/about/park-art-table.jpg'],
			['desc' => 'John The Leatherman at Brooks Medieval Faire, Ab.' , 'link' => '/images/about/brooks-tent.jpg'],
		];
	@endphp

	<div class="row mt40">
		<div class="col-sm-12 col-md-8 offset-md-2">
			<div class="row">
				@foreach($pics as $p)
					<div class="col-12 col-md-4">
						<a data-fancybox="gallery" href="{{$p['link']}}">
							<img class="img img-fluid" src="{{$p['link']}}" title="{{$p['desc']}}" alt="{{$p['desc']}}"/>
						</a>
					</div>
				@endforeach
			</div>
		</div>
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
		@slot('title', 'The Process')
		<p>
			There are many steps involved when making leather items by hand. The leather is measured and cut to size, the pattern is then tooled onto the leather, stain is applied and and edges are hand burnished. The position of every stitch is carefully planned, pre-punched, then placed with care. There are no machines involved in this process.
		</p>
		<p>
			 Using leather as a canvas, I am able to preserve my artwork into something that will last a lifetime. Find out more about each step of the process below.
		</p>
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Sketch an Original Pattern')
		@slot('src', '/images/process/elk_sketch.jpg')
		@slot('alt', 'Sketches of an elk head')
		@slot('description')
		Every design you see on this site started its life as lead from a pencil. I spend a lot of time making sure the design is something the owner of a piece will want to look at forever!
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Transfer the Pattern')
		@slot('src', '/images/process/elk_transfer.jpg')
		@slot('alt', 'Transfering the pattern to leather')
		@slot('description')
		Once the pattern has been finalized, it is transferred onto damp leather with a stylus.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Make Cuts with a Swivel Knife')
		@slot('src', '/images/process/elk_swivel_knife.jpg')
		@slot('alt', 'Elk after cutting with a swivel knife')
		@slot('description')
		Next, a tool called a swivel knife is used to cut the lines deeper into the surface of the leather in preparation for tooling.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Beveling and Background')
		@slot('src', '/images/process/elk_beveling.jpg')
		@slot('alt', 'Elk after beveling')
		@slot('description')
		After the lines are cut, a mallet, beveler and a steady hand are used to give the design depth. After beveling, parts of the scene appear to stand up out of the leather. The background tool is used to push leather back so the subject can stand out even more.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'More Tooling')
		@slot('src', '/images/process/elk_tooled.jpg')
		@slot('alt', 'Elk after tooling')
		@slot('description')
		In a similar fashion to beveling and backgrounding, other tools are used to give the design more details, depth and character. There are many different shapes and sizes of tools available depending on what is needed.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Punch Holes')
		@slot('src', '/images/process/elk_holes.jpg')
		@slot('alt', 'Holes punched and ready to be stitched')
		@slot('description')
		In order to attach two pieces of leather together, I use stiches. Because leather is so thick, each hole must be pre-punched with a sharp tool, so the needles can get through in a later step.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Colouring')
		@slot('src', '/images/process/elk_stain.jpg')
		@slot('alt', 'Applying stain to a wallet')
		@slot('description')
		I usually use vegetable tanned leather for my progects, which is a light pink colour by default. I often use dye, paint or other finishing products to darken the leather and get the desired colour. A water resistant coating is also applied at this stage.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Stitching')
		@slot('src', '/images/process/elk_stitching.jpg')
		@slot('alt', 'Needle and thread and a finished saddle stitch')
		@slot('description')
		After the stain dries, it is time to stitch. I use waxed thread and an inset saddle stitch which is very strong. No sewing machine used here, each stich takes a few seconds to place!
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Trimming')
		@slot('src', '/images/process/elk_trimming.jpg')
		@slot('alt', 'Cutting off excess leather')
		@slot('description')
		To ensure that everything lines up perfectly and the edges of the piece are neat and tidy, the final cut to size happens near the end of the process, after stitching.
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Edging')
		@slot('src', '/images/process/elk_edging.jpg')
		@slot('alt', 'Holes punched ready to stitch')
		@slot('description')
		An edge beveler is used to knock off sharp corners (this is a very satisfying step). Then the newly exposed edges need a touchup of colour. Lastly, the edges are hand burnished to a glossy finish with a smooth piece of wood and some elbow grease!
		@endslot
	@endcomponent

	@component('components.process_row')
		@slot('title', 'Finishing Touches')
		@slot('src', '/images/process/elk_finished.jpg')
		@slot('alt', 'Holes punched ready to stitch')
		@slot('description')
		After a buff and polish with some sheep's wool, this one of a kind piece is ready to ship!
		@endslot
	@endcomponent

	@component('components.cta_button')
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

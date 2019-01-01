<div class="row">
	<div class="col-12 text-center">
		<h1 class="mb20">{{$title}}</h1>
	</div>

	@if(!empty($icon))
	<div class="col-12 text-center mb20">
		<div class="">
			@include($icon)
		</div>
	</div>
	@endif

	<div class="col-12">
		{{$slot}}
	</div>
</div>
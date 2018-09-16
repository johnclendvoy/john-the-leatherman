<div class="row">
	<div class="col-xs-12 col-sm-12 text-center">
		<h1 class="">{{$slot}}
		@if(!empty($icon))
			<div class="mt20">
				@include($icon)
			</div>
		@endif
		</h1>
	</div>
</div>
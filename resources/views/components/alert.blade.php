<div class="row mb30">
	<div class="col-12">
		<div class="alert alert-{{$type}}">
			<div class="row">
				<div class="col-12 text-center mb20">
					<h3>{{$title}}</h3>
					@if(!empty($subtitle))
						<h5>{{$subtitle}}</h5>
					@endif
				</div>
				<div class="col-12 text-center mb20">
					@if(!empty($icon))
						@include('svg.'.$icon)
					@elseif($type === 'danger')
						@include('svg.cancel')
					@endif
				</div>
				@if(!empty($body))
				<div class="col-12">
					{{$body}}
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

	<div class="jumbotron title">
		<div class="container">
	
			<h2>{{ strtoupper($title) }}&nbsp;</h2>

			@if(!empty($links))
			<span class="social">
				@forelse ($links as $link)
					<a class="social-link" target="_blank" href="{{ $link['url'] }}">
						<i class="fa fa-{{$link['site']}}"></i>
					</a>
				@empty
				@endforelse
			</span>
			@endif
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
	
			<h2>{{ strtoupper($title) }}&nbsp;</h2>

			@unless(empty($social))
				@foreach ($social as $soc)
					<a class="social-link" target="_blank" href="{{ $soc['url'] }}">
						<img class="img-social" src="/logos/{{ $soc['site'] }}.png" alt="{{ $soc['site'] }} logo in green">
					</a>
				@endforeach
			@endunless
		</div>
	</div>

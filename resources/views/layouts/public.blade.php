<!DOCTYPE html>

<html>
	@include('partials.head')
	<body>
		<div id="animated-bg">
			@include('partials.header')
			<div id="body">
			@yield('banner')
				<div class="container">
					@yield('content')
				</div>
				@include('partials.footer')
			</div> <!-- #body -->
		</div> <!-- #animated-bg -->

		@include('partials.scripts')
		@yield('scripts')
		@yield('js')
		@yield('leathernav-js')
	</body>
</html>

<!DOCTYPE html>

<html>
	@include('partials.head')
	<body>
		<div id="animated-bg">
			@include('partials.header')
			<div id="body">
				@yield('content')
				@include('partials.footer')
			</div> <!-- #body -->
		</div> <!-- #animated-bg -->

		@include('partials.scripts')
		@yield('scripts')
		@yield('js')
	</body>
</html>

<!DOCTYPE html>

<html>
	@include('partials.head')

	<body>
		{{-- <div id="wrapper"> --}}

		<div id="animated-bg">

			<header>
				<h1>John The Leatherman</h1>
				@include('partials.navbar')
			</header>

			<div id="body">

				<div class="container">

{{-- 					@if(!empty(Request::segment(1)))
						<h2>@yield('title')</h2>
					@endif
 --}}				</div>



			    {{-- main content --}}
				@yield('content')
			    {{-- end main content --}}
				

			@include('partials.footer')
			
			</div> <!-- #body -->
		{{-- </div> #wrapper --}}
		</div> <!-- #animated-bg -->

		@include('partials.scripts')
		@yield('scripts')

		@yield('js')
	</body>
</html>

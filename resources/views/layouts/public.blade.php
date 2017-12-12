<!DOCTYPE html>

<html>
	@include('partials.head')

	<body>
		{{-- <div id="wrapper"> --}}
		<div id="animated-bg">

			<header>
				<div class="title-bar" style="width:100%;">
					<span>
						<a href="/" class="h3">John The Leatherman</a>
					</span>
					<span class="float-right title-bar-right">
						@if(Auth::check())
						<a href="/admin">Admin</a>
						@endif
						<a href="/leather">Products</a>
						<a href="/contact">Info</a>

						@if(\Session::has('cart'))
						<a href="/cart">Cart</a>
						@endif

					</span>
				</div>
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

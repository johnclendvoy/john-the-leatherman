<!DOCTYPE html>

<html>
	@include('partials.head')

	<body>
		{{-- <div id="wrapper"> --}}
		<div id="animated-bg">

			<header>
				<div class="title-bar" style="width:100%;">

					<div class="row">
					<div class="col-sm-8 col-xs-12 text-center text-sm-left">
						<a href="/" class="h3">John The Leatherman</a>
					</div>
					<div class="col-sm-4 col-xs-12 text-center text-sm-right title-bar-right">
						@if(Auth::check())
						<a href="/admin">Admin</a>
						@endif
						<a href="/leather">Products</a>
						<a href="/contact">Info</a>

						@if(\Session::has('cart'))
						<a href="/cart">Cart</a>
						@endif
					</div>
					</div>

					{{--}}
					<span class="text-center text-md-left">
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
					{{--}}
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

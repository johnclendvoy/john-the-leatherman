<header>
	<div class="title-bar border-bottom">
		<div class="row">
			<div class="col-md-5 col-sm-12 text-center text-md-left">
				<a href="/" class="h2"><strong>John The Leatherman</strong></a>
			</div>
			<div class="col-md-7 col-sm-12 text-center text-md-right title-bar-right">
				@if(Auth::check())
					<a href="/admin">Admin</a>
				@endif
				<a href="/leather">Products</a>
				<a href="/about">About</a>
				<a href="/contact">Contact</a>
				@if(\Session::has('cart'))
					<a href="/bag">
						{{-- <i class="fa fa-shopping-bag"></i> --}}
						<span class="shift-down">@include('svg.shopping-bag', ['height' => '1em'])</span>
						<span id="cart-count">{{count(session('cart'))}}</span></a>
				@endif
			</div>
		</div>
	</div>
</header>
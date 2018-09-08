<header>
	<div class="title-bar border-bottom">
		<div class="row">
			<div class="col-sm-6 col-xs-12 text-center text-sm-left">
				<a href="/" class="h2"><strong>John The Leatherman</strong></a>
			</div>
			<div class="col-sm-6 col-xs-12 text-center text-sm-right title-bar-right">
				@if(Auth::check())
					<a href="/admin">Admin</a>
				@endif
				<a href="/leather">Products</a>
				<a href="/contact">Info</a>
				@if(\Session::has('cart'))
					<a href="/cart"><i class="fa fa-shopping-bag"></i>&nbsp;<span id="cart-count">{{count(session('cart'))}}</span></a>
				@endif
			</div>
		</div>
	</div>
</header>
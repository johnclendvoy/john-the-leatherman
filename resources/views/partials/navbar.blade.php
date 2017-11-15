<nav class="text-center">
		<!-- Brand and toggle get grouped for better mobile display -->

    		<!-- Collect the nav links, forms, and other content for toggling -->
			<ul class="navigation">
				@if(Auth::check())
				<li><a class="{{setActive('admin')}}" href="/admin">Admin</a></li>
				@endif
				<li><a class="{{setActive('about')}}" href="/about">About</a></li>
				<li><a class="{{setActive('leather')}}" href="/leather">Leather</a></li>
				<li><a class="{{setActive('contact')}}" href="/contact">Contact</a></li>
			</ul>
	
</nav>

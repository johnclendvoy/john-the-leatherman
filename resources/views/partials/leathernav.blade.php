
<div class="container visible-md visible-lg">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-default btn-lg {{empty($category) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($color) ? '/color/'.$color->slug : ''}}">All</a>
			@foreach ($categories as $cat)
				@if($cat->leathers->count())
					<a class="btn btn-default btn-lg {{ (!empty($category) && $category->name == $cat->name) || (!empty($leather) && $leather->category->name == $cat->name) ? 'active' : '' }}" href="/leather/category/{{ $cat->slug }}{{ !empty($color) ? '?color='.$color->slug : ''}}">{{ ucwords($cat->name) }}</a>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="container m-t-10 m-b-30 visible-md visible-lg">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-default btn-lg {{empty($color) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($category) ? '/category/'.$category->slug : ''}}">Any</a>
			@foreach ($colors as $col)
				@if($col->leathers->count())
						<a class="btn btn-default btn-lg {{ (!empty($color) && $color->name == $col->name) || (!empty($leather) && $leather->color->name == $col->name) ? 'active' : '' }}" href="/leather/color/{{ $col->slug }}{{ !empty($category) ? '?category='.$category->slug : ''}}"><span class="color-swatch" style="background-color:{{ $col->hexcode }}"></span>&nbsp;{{ ucwords($col->name) }}</a>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="container visible-xs visible-sm">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-default btn {{empty($category) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($color) ? '/color/'.$color->slug : ''}}">All</a>
			@foreach ($categories as $cat)
				@if($cat->leathers->count())
					<a class="btn btn-default btn {{ (!empty($category) && $category->name == $cat->name) || (!empty($leather) && $leather->category->name == $cat->name) ? 'active' : '' }}" href="/leather/category/{{ $cat->slug }}{{ !empty($color) ? '?color='.$color->slug : ''}}">{{ ucwords($cat->name) }}</a>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="container m-t-10 m-b-30 visible-xs visible-sm">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-default btn {{empty($color) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($category) ? '/category/'.$category->slug : ''}}">Any</a>
			@foreach ($colors as $col)
				@if($col->leathers->count())
						<a class="btn btn-default btn {{ (!empty($color) && $color->name == $col->name) || (!empty($leather) && $leather->color->name == $col->name) ? 'active' : '' }}" href="/leather/color/{{ $col->slug }}{{ !empty($category) ? '?category='.$category->slug : ''}}"><span class="color-swatch" style="background-color:{{ $col->hexcode }}"></span>&nbsp;<span class="hidden-xs">{{ ucwords($col->name) }}</span></a>
				@endif
			@endforeach
		</div>
	</div>
</div>


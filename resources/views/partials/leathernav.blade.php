<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-secondary btn {{empty($category) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($color) ? '/color/'.$color->slug : ''}}">All</a>
			@foreach ($categories as $cat)
				@if($cat->leathers->count())
					<a class="btn btn-secondary btn {{ (!empty($category) && $category->name == $cat->name) || (!empty($leather) && $leather->category->name == $cat->name) ? 'active' : '' }}" href="/leather/category/{{ $cat->slug }}{{ !empty($color) ? '?color='.$color->slug : ''}}">{{ ucwords($cat->name) }}</a>
				@endif
			@endforeach
		</div>
	</div>
	<div class="row m-t-10 m-b-30">
		<div class="col-sm-12">
			<a class="btn btn-secondary btn {{empty($color) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($category) ? '/category/'.$category->slug : ''}}">Any</a>
			@foreach ($colors as $col)
				@if($col->leathers->count())
					<a class="btn btn-secondary btn {{ (!empty($color) && $color->name == $col->name) || (!empty($leather) && $leather->color->name == $col->name) ? 'active' : '' }}" href="/leather/color/{{ $col->slug }}{{ !empty($category) ? '?category='.$category->slug : ''}}"><span class="color-swatch" style="background-color:{{ $col->hexcode }}"></span>&nbsp;<span class="hidden-xs">{{ ucwords($col->name) }}</span></a>
				@endif
			@endforeach
		</div>
	</div>
</div>


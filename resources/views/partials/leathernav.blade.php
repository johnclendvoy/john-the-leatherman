<div class="container d-none d-sm-block">
	<div class="row mt20">
		<div class="col-sm-12">
			<a class="btn btn-secondary square {{empty($category) && empty($leather) ? 'active' : '' }}" href="/leather{{ !empty($color) ? '?color='.$color->slug : ''}}">All</a>
			@foreach ($categories as $cat)
				@if($cat->leathers->count())
					<a class="btn btn-secondary square {{ (!empty($category) && $category->name == $cat->name) || (!empty($leather) && $leather->category->name == $cat->name) ? 'active' : '' }}" href="/leather?category={{ $cat->slug }}{{ !empty($color) ? '&color='.$color->slug : ''}}">{{ ucwords($cat->name) }}</a>
				@endif
			@endforeach
		</div>
	</div>

	<div class="row mt20 mb30">
		<div class="col-sm-12">
			<a class="btn btn-secondary square {{empty($color) && empty($leather) ? 'active' : '' }}" href="/leather?{{ !empty($category) ? '?category='.$category->slug : ''}}">Any</a>
			@foreach ($colors as $col)
				@if($col->leathers->count())
					<a class="btn btn-secondary square {{ (!empty($color) && $color->name == $col->name) || (!empty($leather) && $leather->color->name == $col->name) ? 'active' : '' }}" href="/leather?color={{ $col->slug }}{{ !empty($category) ? '&category='.$category->slug : ''}}"><span class="color-swatch" style="background-color:{{ $col->hexcode }}"></span>&nbsp;<span class="hidden-xs">{{ ucwords($col->name) }}</span></a>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="container d-block d-sm-none">
	<form id="leather-nav-form" action="/leather">
		<div class="row mt20">
			<div class="col-sm-12">
				<select name="category" id="category-select" class="select2 form-control square">
					<option value="">All Categories</option>
					@foreach ($categories as $cat)
						<option {{!empty($category) &&	$cat->id == $category->id ? 'selected' : ''}} value="{{$cat->slug}}">{{$cat->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row mt20 mb20">
			<div class="col-sm-12">
				<select name="color" id="color-select" class="form-control square">
					<option value="">Any Colour</option>
					@foreach ($colors as $col)
						<option title="{{$col->hexcode}}" {{!empty($color) && $col->id == $color->id ? 'selected' : ''}} value="{{$col->slug}}">{{$col->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</form>

</div>

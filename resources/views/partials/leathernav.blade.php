<form id="leathernav-form" action="/leather">
	<input type="hidden" name="color" value="{{$color->slug ?? ''}}">
	<input type="hidden" name="category" value="{{$category->slug ?? ''}}">
	<input type="hidden" name="available" value="{{$available}}">
</form>

<!-- desktop buttons -->
<div class="d-none d-sm-block">
	<div class="row">
		<div class="col-sm-12">
			<a data-value="" data-name="category" class="leathernav-button btn btn-secondary square {{active($category)}}">All</a>
			@foreach ($categories as $cat)
				<a data-value="{{$cat->slug}}" data-name="category" class="leathernav-button btn btn-secondary square {{ active($category, $cat) }}">{{ ucwords($cat->name) }}</a>
			@endforeach
		</div>
	</div>

	<div class="row mt20">
		<div class="col-sm-12">
			<a data-value="" data-name="color" class="leathernav-button btn btn-secondary square {{ active($color) }}">Any</a>
			@foreach ($colors as $col)
				<a data-value="{{$col->slug}}" data-name="color" class="leathernav-button btn btn-secondary square {{active($color, $col)}}"><span class="color-swatch" style="background-color:{{ $col->hexcode }}"></span>&nbsp;<span class="hidden-xs">{{ ucwords($col->name) }}</span></a>
			@endforeach
		</div>
	</div>

	<div class="row mt20 mb30">
		<div class="col-sm-12">
			<a data-name="available" data-value="" class="leathernav-button btn btn-secondary square {{active($available)}}">All</a>
			<a  data-name="available" data-value="sale" class="leathernav-button btn btn-secondary square {{ (!empty($available) && $available == 'sale') ? 'active' : '' }}">For Sale</a>
			<a data-name="available" data-value="past" class="leathernav-button btn btn-secondary square {{ (!empty($available) && $available == 'past') ? 'active' : '' }}">Past Works</a>
		</div>
	</div>
</div>

<!-- mobile pickers -->
<div class="d-block d-sm-none">
	<div class="row">
		<div class="col-sm-12">
			<select data-name="category" id="category-select" class="leathernav-select select2 form-control square">
				<option value="">All Categories</option>
				@foreach ($categories as $cat)
					<option {{!empty($category) &&	$cat->id == $category->id ? 'selected' : ''}} value="{{$cat->slug}}">{{$cat->name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="row mt20 mb20">
		<div class="col-sm-12">
			<select data-name="color" id="color-select" class="leathernav-select form-control square">
				<option value="">Any Colour</option>
				@foreach ($colors as $col)
					<option title="{{$col->hexcode}}" {{!empty($color) && $col->id == $color->id ? 'selected' : ''}} value="{{$col->slug}}">{{$col->name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="row mt20 mb20">
		<div class="col-sm-12">
			<select data-name="available" id="available-select" class="leathernav-select select2 form-control square">
				<option value="">All Products</option>
				<option {{$available == 'sale' ? 'selected' : ''}} value="sale">For Sale</option>
				<option {{$available == 'past' ? 'selected' : ''}} value="past">Past Works</option>
			</select>
		</div>
	</div>
</div>

@section('leathernav-js')
	<script type="text/javascript">

		$(document).ready(function(){

		    function colorSwatchOption(state) {
		    	if(state.title == '') {
					return state.text;
		    	}
				return $(
			    	'<span class="color-swatch" style="background-color:' + state.title + ';"></span>&nbsp;' + state.text + '</span>'
			  	);
		    }

			// select 2 with color swatches
			$("#color-select").select2({
			  	templateResult: colorSwatchOption,
			  	templateSelection: colorSwatchOption,
			});

			$('.leathernav-button').click(function(e){
				e.preventDefault();
				var name = $(this).data('name');
				var val = $(this).data('value');
				$('input[name="'+name+'"]').val(val);
				$('#leathernav-form').submit();
			});
		    
		    //leather nav select boxes
		    $('.leathernav-select').change(function(){
				var name = $(this).data('name');
		    	var val = $(this).find('option:selected').val();
				$('input[name="'+name+'"]').val(val);
				$('#leathernav-form').submit();
		    });

		});


	</script>
@stop

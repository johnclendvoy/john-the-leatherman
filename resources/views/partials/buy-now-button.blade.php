@if($leather->available)
	<div class="row">
		<div class="col-sm-12 text-center">
				<form action="/bag" method="post" id="add-to-cart">
				{{csrf_field()}}
				<input type="hidden" name="leather_id" value="{{$leather->id}}">
				<span class="h1 price">${{$leather->price}}</span>

				<button class="btn btn-secondary btn-lg square">
				@if(Cart::contains($leather->id))
					Remove from Bag
				@else
					{{ Cart::items()->count() ? 'Add to Bag' : 'Buy Now'}}
				@endif
				</button>
			</form>
		</div>
	</div>
@endif
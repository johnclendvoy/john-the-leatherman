<div class="row">
	@forelse ($leathers as $leather)
		<div class="col-6 col-sm-6 col-md-3 col-lg-3 leather-item">
			<a href="{{$leather->url}}">
{{-- 				@if($leather->available)
					<div class="flag">for sale</div>
				@endif
 --}}				<img class="img img-fluid" src="{{ $leather->image('thumbnail') }}" alt="A picture of {{ $leather->name }}"/>
			</a>
			<div class="text-center popup border-bottom">
				<span class="popup-name">{{$leather->name}}</span>
				@if($leather->available)
					<div class="h4">${{$leather->price}}</div>
				@else
					<div class="small">Custom Order Only</div>
				@endif
			</div>
		</div>
	@empty
		<div class="col-12">
			<p>No items match your search.</p>
		</div>
	@endforelse
</div>

<div class="row">
	@forelse ($leathers as $leather)
		<div class="col-xs-6 col-sm-6 col-md-3 leather-item">
			<a href="/leather/{{ $leather->id }}">
				<img class="img img-fluid" src="{{ $leather->image('thumbnail') }}" alt="A picture of {{ $leather->name }}"/>
			</a>
			<div class="text-center popup"><span class="popup-name">{{$leather->name}}</span></div>
		</div>
	@empty
		<div class="col-xs-12">
			<p>No items match your search.</p>
		</div>
	@endforelse
</div>

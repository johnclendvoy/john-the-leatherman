@if(count($errors))
	<div class="row">
		<div class="col-sm-12 form-group alert alert-danger">
			<ul>
				@foreach($errors->all() as $e)
				<li>{{$e}}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif
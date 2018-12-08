@component('components.title_row')
@yield('title')
@endcomponent

@if(empty($id))
	<form method="POST" action="/leather" class="form" enctype="multipart/form-data">
@else
	<form method="POST" action="/{{$route}}/{{ $id }}" class="form" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="PATCH">
@endif
		{{ csrf_field() }}
		@include('partials.form_errors')

		{{$slot}}

		<div class="form-group">
			<button class="btn btn-primary" type="submit">{{ empty($id) ? 'Add' : 'Update' }}</button>
		</div>
		
	</form>

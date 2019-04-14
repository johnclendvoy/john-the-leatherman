@component('components.title_row')
	@slot('title')
		@yield('title')
	@endslot
@endcomponent

@if(empty($id))
	<form method="POST" action="/{{$route}}" class="form" enctype="multipart/form-data">
@else
	<form method="POST" action="/{{$route}}/{{ $id }}" class="form" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="PATCH">
@endif
		{{ csrf_field() }}
		@include('partials.form_errors')

		{{-- all form fields go here --}}
		{{$slot}}

		<div class="form-group">
			<button class="btn btn-primary square" type="submit">{{ empty($id) ? 'Add' : 'Update' }}</button>
		</div>
		
	</form>

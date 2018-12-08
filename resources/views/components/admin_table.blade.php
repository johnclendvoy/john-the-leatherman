@component('components.title_row')
	@yield('title')
@endcomponent

<div class="row mt20">
	<div class="col-sm-12">
		<a href="/{{$route}}/create" class="btn btn-primary square"><i class="fa fa-plus"></i> Add New Item</a>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped">
				{{ $slot }}
			</table>
		</div>
	</div>
</div>

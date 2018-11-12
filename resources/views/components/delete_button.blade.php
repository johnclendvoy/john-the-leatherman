<form method="POST" action="{{$slot}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE" >
	<a class="delete-button btn btn-secondary btn-danger square"><i class="fa fa-trash"></i></a>
</form>
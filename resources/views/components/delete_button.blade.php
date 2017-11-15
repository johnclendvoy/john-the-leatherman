<form method="POST" action="{{$slot}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE" >
	<a class="delete-button btn btn-danger">Delete</a>
</form>
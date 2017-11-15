
<div class="row">
	<form method="POST" action="/contact">
	{{ csrf_field() }}

		<div class="text-center form-group col-sm-12">
			@if($sent)
				<h3>Thanks for the message</h3>
				<p> I'll get back to you as soon as I can.</p>
			@else
				<h3>Let me know what you think.</h3>
				<p>If you have any questions, comments, to request a custom leather item, let me know by filling out the form below.</p>
			@endif
		</div>


		@if(count($errors))
			<div class="form-group col-sm-12 bg-danger">
				<ol>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ol>
			</div>
		@endif

		<div class="form-group col-sm-12 {{ $errors->has('name') ? 'has-error' : '' }}">
			<label>Name</label>
			<input name="name" type="text" class="form-control rect" value="{{ old('name') }}">
		</div>

		<div class="form-group col-sm-12 {{ $errors->has('email') ? 'has-error' : '' }}">
			<label>Email</label>
			<input name="email" type="text" class="form-control rect" value="{{ old('email') }}">
		</div>

		<div class="form-group col-sm-12 {{ $errors->has('comments') ? 'has-error' : '' }}">
			<label>Message</label>
			<textarea name="comments" class="form-control rect" >{{ old('comments') }}</textarea>
		</div>

		<div class="form-group col-sm-12">
			<button name="send" type="submit" class="btn btn-default" >Send Message</button>
		</div>
	</form>
</div>

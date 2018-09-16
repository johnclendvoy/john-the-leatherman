@extends('layouts.public')
@section('title', 'Contact')

@section('content')

	<div id="contact" class="container">
		@component('components.title_row')
			Contact John
			@slot('icon', 'svg.chat')
		@endcomponent

		<div class="row">

			<div class="col-sm-12 col-md-6">
				<p>Do you have any questions or comments about my work? Would like to request a custom leather item? Are you having issues with the website? Let me know by filling out this form.</p>
			</div>

			<div class="col-sm-12 col-md-6">
			
				<form method="POST" action="/contact">
					{{ csrf_field() }}
					{!! app('captcha')->render() !!}

					@include('partials.form_errors')

					<div class="row form-group">
						<div class="col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
							<label>Your Name</label>
							<input required name="name" type="text" class="form-control" value="{{ old('name') }}">
						</div>
						<div class="col-sm-6 {{ $errors->has('email') ? 'has-error' : '' }}">
							<label>Email Address</label>
							<input required name="email" type="email" class="form-control rect" value="{{ old('email') }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 {{ $errors->has('comments') ? 'has-error' : '' }}">
							<label>Your Message</label>
							<textarea required name="comments" class="form-control rect" >{{ old('comments') }}</textarea>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-12 text-center">
							<button name="send" type="submit" class="btn btn-secondary square" >Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
@stop

@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('[fancy-box]').fancybox({
			titleShow: true
		})
	});
</script>
@stop

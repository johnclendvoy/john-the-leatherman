
@if(session()->has('sent_message'))
	@component('components.alert')
		@slot('type', 'success')
		@slot('icon', 'envelope')
		@slot('title', 'Thank you!')
		@slot('subtitle', 'Your message was sent')
		@slot('body')
			<div class="text-center">
			<p>I will get back to you as soon as I can.</p>
			</div>
		@endslot
	@endcomponent
	{{session()->forget('sent_message')}}
@endif

@if(session()->has('sent_suggestion'))
	@component('components.alert')
		@slot('type', 'success')
		@slot('icon', 'envelope')
		@slot('title', 'Thank you!')
		@slot('subtitle', 'Your suggestion was received')
		@slot('body')
			<div class="text-center">
			<p>I will let you know if your idea ever inspires something I make in the future!</p>
			</div>
		@endslot
	@endcomponent
	{{session()->forget('sent_suggestion')}}
@endif

@if(count($errors))
	@component('components.alert')
		@slot('type', 'danger')
		@slot('title', 'Hold On!')
		@slot('subtitle', 'It looks like you forgot something')
		@slot('body')
			<div class="text-center">
				@foreach($errors->all() as $e)
				<p>{{$e}}</p>
				@endforeach
			</div>
		@endslot
	@endcomponent
@endif

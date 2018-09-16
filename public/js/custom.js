$(document).ready(function(){

	$(".fancybox").fancybox();

	$('.delete-button').click(function(){
		var form = $(this).parent();

		swal({
		  	title: "Are you sure?",
		  	text: "It will be gone forever.",
		  	type: "warning",
		  	showCancelButton: true,
		  	confirmButtonColor: "#DD6B55",
		  	confirmButtonText: "yes, delete it!",
		  	closeOnConfirm: false
		},
		function(){
			form.submit();
		});
	});

    $('.select2').select2();
});
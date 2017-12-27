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


    function getLeather()
    {
    	// var color = $('#color-select').find(":selected").val();
    	// var category = $('#category-select').find(":selected").val();
    	// var form = $('#leather-nav-form').
    	$('leather-nav-form').submit();
    }

    // leather nav select boxes
    $('#color-select').change(function(e){
    	e.preventDefault();
    	getLeather();
    });
    $('#category-select').change(function(e){
    	e.preventDefault();
    	getLeather();
    });


});
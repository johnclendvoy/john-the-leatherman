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

    // select 2 with color swatches
    function colorSwatchOption(state)
    {
    	if(state.title == '') {
			return state.text;
    	}
		return $(
	    	'<span class="color-swatch" style="background-color:' + state.title + ';"></span>&nbsp;' + state.text + '</span>'
	  	);
    }

	$("#color-select").select2({
	  	templateResult: colorSwatchOption,
	  	templateSelection: colorSwatchOption,
	});
    
    //leather nav select boxes
    $('#color-select').change(function(){
    	$('#leather-nav-form').submit();
    });
    $('#category-select').change(function(){
    	$('#leather-nav-form').submit();
    });

});
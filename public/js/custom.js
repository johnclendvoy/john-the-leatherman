$(document).ready(function(){

	// leathers.show
  	$('.slider-for-1').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.slider-nav-1'
	});

  	$('.slider-for-2').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.slider-nav-2'
	});

  	$('.slider-for-3').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.slider-nav-3'
	});

	$('.slider-nav-1').slick({
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	asNavFor: '.slider-for-1',
	  	dots: true,
	  	centerMode: true,
	  	focusOnSelect: true,
	  	variableWidth: true,
	});

	$('.slider-nav-2').slick({
	  	slidesToShow: 2,
	  	slidesToScroll: 1,
	  	asNavFor: '.slider-for-2',
	  	dots: true,
	  	centerMode: true,
	  	focusOnSelect: true,
	  	variableWidth: true,
	});

	$('.slider-nav-3').slick({
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
	  	asNavFor: '.slider-for-3',
	  	dots: true,
	  	centerMode: true,
	  	focusOnSelect: true,
	  	variableWidth: true,
	});

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

});
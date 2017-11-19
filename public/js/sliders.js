// slick sliders
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
  	dots: false,
  	centerMode: true,
  	focusOnSelect: true,
  	variableWidth: true,
});

$('.slider-nav-2').slick({
  	slidesToShow: 2,
  	slidesToScroll: 1,
  	asNavFor: '.slider-for-2',
  	dots: false,
  	centerMode: true,
  	focusOnSelect: true,
  	variableWidth: true,
});

$('.slider-nav-3').slick({
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	asNavFor: '.slider-for-3',
  	dots: false,
  	centerMode: true,
  	focusOnSelect: true,
  	variableWidth: true,
});

$(document).ready(function() {
	$(".fancybox").fancybox();
});
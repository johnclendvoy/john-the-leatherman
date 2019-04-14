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
      // prevArrow:'<i class="fa fa-check"></i>',
      // nextArrow:'<i class="fa fa-check"></i>'
      // prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-check' aria-hidden='true'></i></button>",
      //   nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});

$('.slider-nav-2').slick({
  	slidesToShow: 2,
  	slidesToScroll: 1,
  	asNavFor: '.slider-for-2',
  	dots: false,
  	centerMode: true,
  	focusOnSelect: true,
  	variableWidth: true,
      // prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-check' aria-hidden='true'></i></button>",
      //   nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});

$('.slider-nav-3').slick({
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	asNavFor: '.slider-for-3',
  	dots: false,
  	centerMode: true,
  	focusOnSelect: true,
  	variableWidth: true,
      // prevArrow:'<i class="fa fa-check"></i>',
      // nextArrow:'<i class="fa fa-check"></i>'
      // prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-check' aria-hidden='true'></i></button>",
      //   nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});

$(document).ready(function() {
	$(".fancybox").fancybox();
});
<head>
	<title>John The Leatherman {{ request(	)->segment(1) == '' ? '' : '|'}} @yield('title')</title>
	<meta keyword="John Lendvoy, John C Lendvoy, John The Leatherman, Leather, Walllets, Handmade, Medicine Hat, Canada, Bracelets, Purses, Tooled, Craft">
	<meta author="John C. Lendvoy"> </meta>
	<meta description="John The Leatherman creates one-of-a-kind leather goods. He focuses on unique design, while keeping his products highly functional and durable.">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab" rel="stylesheet">

	<!-- bootstrap -->
	<link href="/plugins/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

 	{{-- plugins --}}
 	<link rel="stylesheet" type="text/css" href="/plugins/dropzone/dropzone.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick-theme.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/fancybox-master/dist/jquery.fancybox.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="/plugins/sweetalert-master/dist/sweetalert.css"/>
 	<link rel="stylesheet" type="text/css" href="/plugins/select2-4.0.6-rc.1/dist/css/select2.min.css"/>

 	{{-- icons --}}
 	<link rel="stylesheet" href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

 	<!--custom -->
	<link  rel="stylesheet" type="text/css" href="/css/style.css">

	@yield('css')

	{{-- p5 background --}}
	{{-- <script type="text/javascript" src="/plugins/p5/libraries/p5.js"></script> --}}

</head>

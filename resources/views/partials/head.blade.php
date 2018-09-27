<head>
	<title>@yield('title') {{ request()->segment(1) == '' ? '' : '|'}} John The Leatherman</title>

	<!-- meta -->
	<meta charset="UTF-8">
	<meta name="keywords" content="John Lendvoy, John C Lendvoy, John The Leatherman, Leather, Walllets, Handmade, Medicine Hat, Canada, Bracelets, Purses, Tooled, Craft">
	<meta name="author" content="John C. Lendvoy">
	<meta name="description" content="John The Leatherman creates one-of-a-kind leather goods. He focuses on unique design, while keeping his products highly functional and durable.">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- favicons https://realfavicongenerator.net -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a3b16c">
	<meta name="msapplication-TileColor" content="#a3b16c">
	<meta name="theme-color" content="#ffffff">
		
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:400,900+Slab" rel="stylesheet">

	<!-- bootstrap -->
	<link href="/plugins/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

 	<!-- plugins -->
 	<link rel="stylesheet" type="text/css" href="/plugins/dropzone/dropzone.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick-theme.css">
 	<link rel="stylesheet" type="text/css" href="/plugins/fancybox-master/dist/jquery.fancybox.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="/plugins/sweetalert-master/dist/sweetalert.css"/>
 	<link rel="stylesheet" type="text/css" href="/plugins/select2-4.0.6-rc.1/dist/css/select2.min.css"/>

 	<!-- icons -->
 	<link rel="stylesheet" href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

 	<!-- custom -->
	<link  rel="stylesheet" type="text/css" href="/css/style.css">

	@yield('css')

</head>

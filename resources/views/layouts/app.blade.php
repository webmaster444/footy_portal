<html>
    <head>
        <title>FootyPortal - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Omar">
		<!-- Meta Description -->
		<meta name="description" content="AI-Powered Sentiment Analysis for Football">
		<!-- Meta Keyword -->
		<meta name="keywords" content="Premier League Footy Portal">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- meta character set -->
		<meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="/css/bootstrap.css">        
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.css">      -->   

		<link rel="stylesheet" href="/css/linearicons.css">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/magnific-popup.css">
		<link rel="stylesheet" href="/css/nice-select.css">							
		<link rel="stylesheet" href="/css/animate.min.css">
		<link rel="stylesheet" href="/css/owl.carousel.css">
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/css/style.css">
    </head>
    <body>                    	
        	@include('includes.header')
        	@yield('content')
        	@include('includes.footer')
			<script src="/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="/js/easing.min.js"></script>			
			<script src="/js/hoverIntent.js"></script>
			<script src="/js/superfish.min.js"></script>	
			<script src="/js/jquery.ajaxchimp.min.js"></script>
			<script src="/js/jquery.magnific-popup.min.js"></script>	
			<script src="/js/owl.carousel.min.js"></script>						
			<script src="/js/jquery.nice-select.min.js"></script>							
			<script src="/js/mail-script.js"></script>	
			<script src="/js/main.js"></script>	
    </body>
</html>
<!doctype html>
<html>
<head>
	<title>Title</title>
@include('website.layouts.styles')
</head>
<body>
	<header>
		<div class="mobile-menu">
			<div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div>
	    	<div class="nveMenu text-left">
			<div class="mobile-cross close-btn-nav" id="navbar"><i class="fas fa-times" aria-hidden="true"></i></div>
				<div>
					<a href="index.php"><img src="{{asset('website/assets/images/logo.png')}}" class="img-fluid"></a>
				</div>
				<ul class="navlinks p-0 mt-4">
					<li><a href="#">Get In Touch</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Case Studies</a></li>
					<li><a href="#">Gallery</a></li>
				</ul>
			</div>
			<div class="overlay"></div>
		</div>
		<div class="desktop-header">
			<div class="container">
				<div class="row">
				<div class="col-md-2">
					<div class="logo-img">
						<img src="{{asset('website/assets/images/logo1.webp')}}" class="img-fluid" alt="">
					</div>
				</div>
				<div class="col-md-10 text-right">
				<div class="actionBtn mt-5">
					@if (isset(auth()->user()->id))
					<a href="{{route('dashboard')}}">Dashboard</a>
					<a href="{{route('user.logout')}}">Logout</a>
					@else
					<a href="{{route('login.view')}}">Login</a>
					@endif
				</div>
				</div>
				</div>
			</div>
		</div>
	</header>
    
<!-- PRELOADER START -->
	<div class="preloader"></div>
<!-- PRELOADER END -->

	
<!-- 
	fancybox images link
	<a data-fancybox="gallery" href="images/logo.png"><img src="images/logo.png"></a>
	<a data-fancybox="gallery" href="images/logo.png"><img src="images/logo.png"></a>
 -->
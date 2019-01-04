@extends('layouts.app')

@section('title', 'Welcome To FootyPortal')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    			<!-- start banner Area -->
			<section class="banner-area relative" id="landingbanner">
				<div id="particles-js"></div>
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-9 col-md-12 justify-content-center ">
							<h1>
								Welcome to FootyPortal		
							</h1>
							<h2 class="text-white mx-auto">AI-Powered Sentiment Analysis for Football</h2>
							<p class="text-white mx-auto">
								Want to know how fellow fans are feeling about your club? Well we've hooked our powerful system into Twitter to instantly show you what they're saying.</p>

							<p class="text-white mx-auto">
								Start by choosing your team below:
							</p>							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->									

			<!-- Start brands Area -->
			<section class="brands-area pb-60 pt-60">
				<div class="container no-padding">
					<div class="row">
						<div class='col-sm-2'>
							<a href="/clubs/1"><img class="mx-auto" src="img/club1.png" alt=""></a>
						</div>
						<div class='col-sm-2'>
							<a href="/clubs/2"><img class="mx-auto" src="img/club2.png" alt=""></a>
						</div>
						<div class='col-sm-2'>
							<a href="/clubs/3"><img class="mx-auto" src="img/club3.png" alt=""></a>
						</div>
						<div class='col-sm-2'>
							<a href="/clubs/4"><img class="mx-auto" src="img/club4.png" alt=""></a>
						</div>
						<div class='col-sm-2'>
							<a href="/clubs/5"><img class="mx-auto" src="img/club5.png" alt=""></a>
						</div>
						<div class='col-sm-2'>
							<a href="/clubs/6"><img class="mx-auto" src="img/club6.png" alt=""></a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End brands Area -->	
@endsection
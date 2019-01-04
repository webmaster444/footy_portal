@extends('layouts.app')

@section('title', $club->clubname)

@section('content')
	<!-- start banner Area -->
	<section class="banner-area relative" id="home">	
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="club-header-content col-lg-12">
					<img src= {{ $club->img_file_path }} alt={{ $club->clubname }} />
					<h1 class="text-white">
						Sentiment Level for {{ $club -> clubname }}						
					</h1>	
					<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> {{ $club-> clubname}}</a></p>					
				</div>	
			</div>
		</div>
	</section>
	<!-- End banner Area -->

@if (empty($user))
    <section class="service-area section-gap">
    	<div class="container">
    		<div class="row">
    			<h2 class="text-center">Coming soon</h2>
    		</div>
    	</div>    	
    </section>
@else
    <section class="service-area section-gap">
		<div class="container relative">
			<div class="btn-group pull-right position-absolute btns_list" role="group" aria-label="Basic example">
			  <button type="button" class="btn btn-info active" id="btn_current">Current</button>
			  <button type="button" class="btn btn-info" id="btn_1day">Past 1 Day</button>
			  <button type="button" class="btn btn-info" id="btn_1week">Past 1 Week</button>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="single-widget" id="gauge_widget">
						<div id="power-gauge"></div>
						<div id="score_container"><img src="/img/feedback1.png" alt="Feedback" /><span id="score_span">{{number_format($user->sentiment_average * 10, 2) }}</span> out of 10</div>						
					</div>
				</div>
			</div>		
			<div style="width:100%;height:50px"></div>
			<div class="row">
				<div class="col-sm-6">
					<div class="single-widget">
						<div class="row">
							<div class="col-sm-6">
								<p>Positive Word Cloud</p>
								<div id='best-container'></div>
							</div>
						<div class="col-sm-6 text-left">
							<p class="text-center">Top 10 positive re-tweets</p>
							<div class="positive_tweets_wrapper">
							@for ($i = 0; $i < count($pTexts); $i++)    
							    <span class="tweets_text">{{$i+1}}. <span>{{$pTexts[$i]}}}</span></span>
							@endfor
							</div>
						</div>
				</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="single-widget">
						<div class="row">
							<div class="col-sm-6">
								<p>Negative Word Cloud</p>
							<div id="worst-container"></div>
						</div>
						<div class="col-sm-6 text-left">
							<p class="text-center">Top 10 negative re-tweets</p>
							<div class="negative_tweets_wrapper">
							@for ($i = 0; $i < count($nTexts); $i++)    
							    <span class="tweets_text">{{$i+1}}.<span> {{$nTexts[$i]}}}</span></span>
							@endfor
							</div>
						</div>
				</div>
					</div>
				</div>
			</div>
		</div>

		<form id="form" style=" display:none !important">

<!-- <p style="position: absolute; right: 0; top: 0" id="status"></p> -->

<div style="text-align: center;">
  <div id="presets"></div>
  <div id="custom-area">    
    <p><textarea id="positive_text">{{ $user->text_positive }}</textarea></p>
    <p><textarea id="negative_text">{{ $user->text_negative }}</textarea></p>
    <button id="go" type="submit">Go!</button>
  </div>
</div>

<hr>

<div style="float: right; text-align: right">  
  <p><label for="per-line"><input type="checkbox" id="per-line"> One word per line</label>  
</div>

<div style="float: left">
  <p><label>Spiral:</label>
    <label for="archimedean"><input type="radio" name="spiral" id="archimedean" value="archimedean" checked="checked"> Archimedean</label>
    <label for="rectangular"><input type="radio" name="spiral" id="rectangular" value="rectangular"> Rectangular</label>
  <p><label for="font">Font:</label> <input type="text" id="font" value="Impact">
</div>

<div id="angles">
  <p><input type="number" id="angle-count" value="5" min="1"> <label for="angle-count">orientations</label>
    <label for="angle-from">from</label> <input type="number" id="angle-from" value="-60" min="-90" max="90"> °
    <label for="angle-to">to</label> <input type="number" id="angle-to" value="60" min="-90" max="90"> °
</div>

</form>


		<input type="hidden" id="hidden_club" value={{ $club -> id }}/>
		<input type="hidden" id="hidden_sentiment_average" value={{ $user->sentiment_average }} />
		<input type="hidden" id="hidden_time_selector" value="current" />
	</section>
@endif
	<!-- stat chart area -->
	
	<!-- End chart Area -->

	<script src="/js/d3.v4.min.js" type="text/javascript"></script>
	 <script>
    d3version4 = d3   
    window.d3 = null;
  </script>
	<script src="/js/gauge.js" type="text/javascript"></script>		
	<script src="/js/d3.min.js" type="text/javascript"></script>
	 <script>
    d3version3 = d3;
    window.d3 = null;  
  </script>
	<script src="/js/cloud.min.js" type="text/javascript"></script>
	<script src="/js/neg_cloud.min.js" type="text/javascript"></script>	

	<script src="/js/gauge-script.js" type="text/javascript"></script>
@endsection
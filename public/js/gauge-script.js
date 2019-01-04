function onDocumentReady() {
	var powerGauge = gauge('#power-gauge', {
		size: 200,
		clipWidth: 200,
		clipHeight: 120,
		ringWidth: 60,
		maxValue: 10,
		transitionMs: 4000,
	});
	powerGauge.render();
	
	function updateReadings(value) {
		// just pump in random data here...
		powerGauge.update(value);
	}
	
	changeImage();
	function changeImage(){
		var av = ($('#hidden_sentiment_average').val() * 10 ).toFixed(2);

		var imgSrc='';
		if(av<=2){
			imgSrc = '/img/feedback5.png';
		}else if(av<=4){
			imgSrc='/img/feedback4.png';
		}else if(av<=6){
			imgSrc='/img/feedback3.png';
		}else if(av<=8){
			imgSrc='/img/feedback2.png';
		}else if(av<=10){
			imgSrc='/img/feedback1.png';
		}
		$('#score_container img').attr('src',imgSrc);
		$('#score_span').html(av);
	}

	var clubId = $('#hidden_club').val();
	var clubAverage = $('#hidden_sentiment_average').val();
	var timeSelector = $('#hidden_time_selector').val();

	clubAverage = clubAverage * 10;
	updateReadings(clubAverage);
	setInterval(function(){
		sendAjax();
	},5000 * 60);	

	$('#btn_current').click(function(){
		$('.btn').removeClass('active');
		$(this).addClass('active');
		$('#hidden_time_selector').val('current');

		sendAjax();
	})

	function sendAjax(){
		var clubId = $('#hidden_club').val();
		var clubAverage = $('#hidden_sentiment_average').val();
		var timeSelector = $('#hidden_time_selector').val();

		$.ajax(
			{  
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
			    method: 'POST', // Type of response and matches what we said in the route
			    url: 'updateData', // This is the url we gave in the route
			    data: {'id' : clubId,'timeSelector':timeSelector}, // a JSON object to send back
			    dataType: "json",
			   	success: function(response){ // What to do if we succeed
			   		console.log(response);
			    	var clubA = response.average * 10;
			    	$('#hidden_sentiment_average').val(response.average);					    	 	
			    	var pSpanContent = '';
			    	response.pTexts.forEach(function(element,i) {					  
					  pSpanContent += '<span class="tweets_text">'+(i+1)+'. <span>'+element+'</span></span>';
					});
					$('.positive_tweets_wrapper').html(pSpanContent);

			    	var nSpanContent = '';
			    	response.nTexts.forEach(function(element,i) {					  
					  nSpanContent += '<span class="tweets_text">'+(i+1)+'. <span>'+element+'</span></span>';
					});
					$('.negative_tweets_wrapper').html(nSpanContent);

			        updateReadings(clubA);			        
			        changeImage();
			        parsePositiveText(response.text_positive);
			        parseNegativeText(response.text_negative);
			    },
			    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        console.log(JSON.stringify(jqXHR));
			        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    }
			});
	}
	$('#btn_1day').click(function(){
		$('.btn').removeClass('active');
		$(this).addClass('active');
		$('#hidden_time_selector').val('1day');
		sendAjax();
	})

	$('#btn_1week').click(function(){
		$('.btn').removeClass('active');
		$(this).addClass('active');
		$('#hidden_time_selector').val('1week');
		sendAjax();
	})
}

if ( !window.isLoaded ) {
	window.addEventListener("load", function() {
		onDocumentReady();
	}, false);
} else {
	onDocumentReady();
}
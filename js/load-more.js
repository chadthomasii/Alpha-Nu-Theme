jQuery(function($){

	$('.all-articles').append( '<span class="load-more"></span>' );
	var button = $('.all-articles .load-more');
	var page = 2;
    var loading = false;
    //Scroll Settings
	var scrollHandling = {
	    allow: true,
	    reallow: function() {
	        scrollHandling.allow = true;
	    },
	    delay: 400 //(milliseconds) adjust to the highest acceptable value
	};

	$(window).scroll(function(){ // If the user is scrolling for KAPsi
		if( ! loading && scrollHandling.allow && document.getElementsByClassName("all-articles").length) { //All articles test for dom element
			scrollHandling.allow = false;
			setTimeout(scrollHandling.reallow, scrollHandling.delay);  //Reset Timer
            var offset = $(button).offset().top - $(window).scrollTop();
            if( 2000 > offset ) 
            {
				loading = true;
				var data = { //Grabs data from passed obj
					action: 'be_ajax_load_more',
					nonce: beloadmore.nonce,
					page: page,
					query: beloadmore.query,
                };
				$.post(beloadmore.url, data, function(res) { //From URL of passed object, make ajax request
					if( res.success) {
						$('.all-articles').append( res.data); //Append formated html
						$('.all-articles').append( button ); //Add locating button
						page = page + 1;
                        loading = false;
					} else {
						console.log(res);
					}
				}).fail(function(xhr, textStatus, e) {
					console.log(xhr.responseText);
				});

			}
		}
	});
});
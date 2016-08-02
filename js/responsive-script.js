$(function() {
	var $responsiveColumns = $(".responsive-column");
	var $responsiveToggles = $(".responsive-toggle");
	var $header = $("#header");
	var $footer = $("#footer");

	var interval = -1;

	enquire.register("screen and (max-width: 1000px)", {
	    match: function() {
	    	$footer.addClass("secondary-area");

	    	$responsiveToggles.show();

	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");

	        var scrollSpeed = 0;
	        var lastScrollY = $(document).scrollTop();
	        var moving = false;

	        var height = $header.outerHeight();
	        var pos = 0;

	        interval = setInterval(function() {
	        	var sc = $(document).scrollTop();

	        	scrollSpeed = sc-lastScrollY;
	        	lastScrollY = sc;

	        	pos = parseInt($header.css("top"));

	        	if (!moving && pos >= -height && pos <= 0) {
	        		//moving = true;
	        		if (pos - scrollSpeed < -height) {
	        			scrollSpeed = pos+height;
	        		} else if (pos - scrollSpeed > 0) {
	        			scrollSpeed = pos;
	        		}
	        		$header.css({top: "-="+scrollSpeed});
	        	}
	        }, 5);
	    },

	    unmatch: function() {
	    	$header.css({top: 0});
	    	$footer.removeClass("secondary-area");

	    	$responsiveToggles.hide();

	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");

	        if (interval != -1)
	        	clearInterval(interval);
	    }
	});
});
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

	        var height = $header.outerHeight();
	        var startPos = parseInt($header.css("top"));
	        var pos = 0;

	        interval = setInterval(function() {
	        	var sc = $(document).scrollTop();
	        	if (sc != lastScrollY) {
		        	scrollSpeed = sc-lastScrollY;
		        	lastScrollY = sc;

		        	pos = parseInt($header.css("top"));

		        	if (pos >= startPos-height && pos <= startPos) {
		        		if (pos - scrollSpeed < startPos-height) {
		        			scrollSpeed = pos - startPos + height;
		        		} else if (pos - scrollSpeed > startPos) {
		        			scrollSpeed = pos - startPos;
		        		}
		        		$header.css({top: "-="+scrollSpeed});
		        	}
		        }
	        }, 5);
	    },

	    unmatch: function() {
	    	$header.css({top: "initial"});
	    	$footer.removeClass("secondary-area");

	    	$responsiveToggles.hide();

	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");

	        if (interval != -1)
	        	clearInterval(interval);
	    }
	});
});
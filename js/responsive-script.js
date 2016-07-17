$(function() {
	var $responsiveColumns = $('.responsive-column');

	enquire.register("screen and (max-width: 700px)", {
	    match: function() {
	    	$(".responsive-toggle").show();
	    	$(".footer").addClass("secondary-area");
	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");
	    },

	    unmatch: function() {
	    	$(".responsive-toggle").hide();
	    	$(".footer").removeClass("secondary-area");
	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");
	    }
	});
});
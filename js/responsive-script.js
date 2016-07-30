$(function() {
	var $responsiveColumns = $(".responsive-column");
	var $responsiveToggles = $(".responsive-toggle");
	var $footer = $("#footer");

	enquire.register("screen and (max-width: 1000px)", {
	    match: function() {
	    	$footer.addClass("secondary-area");

	    	$responsiveToggles.show();

	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");
	    },

	    unmatch: function() {
	    	$footer.removeClass("secondary-area");

	    	$responsiveToggles.hide();

	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");
	    }
	});
});
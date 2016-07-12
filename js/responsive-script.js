$(function() {
	var $responsiveColumns = $('.responsive-column');

	enquire.register("screen and (max-width: 700px)", {
	    match: function() {
	    	$(".responsive-toggle").show();
	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");
	    },

	    unmatch: function() {
	    	$(".responsive-toggle").hide();
	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");
	    }
	});
});
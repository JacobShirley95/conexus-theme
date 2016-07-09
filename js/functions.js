var initialHeight = 0;

function resize() {
	var marginTop = parseInt($("html").css("margin-top"));

	var docHeight = $("html").height();
	var windowHeight = $(window).height()-marginTop;
	var contentHeight = $(".content-column").height();
	var mainHeight = $("#main").height();

	//console.log(initialHeight+", "+docHeight+", "+windowHeight+", "+mainHeight);

	if (initialHeight < windowHeight || mainHeight < windowHeight) {
		$(".content-column").height(contentHeight+(windowHeight-mainHeight));
	} else {
		initialHeight = $("#main").height();
	}

}

$(function() {
	initialHeight = $("#main").height();

	resize();
	$(window).resize(resize);

	var $responsiveColumns = $('.responsive-column');

	enquire.register("screen and (max-width: 700px)", {
	    match: function() {
	    	$(".side-panel").hide();
	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");
	    },

	    unmatch: function() {
	    	$(".side-panel").show();
	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");
	    }
	});
});
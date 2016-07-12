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
});
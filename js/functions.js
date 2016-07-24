var initialHeight = 0;

function resize() {
	var marginTop = parseInt($("html").css("margin-top"));

	var docHeight = $("html").height();
	var windowHeight = $(window).height()-marginTop;
	var contentHeight = $(".content-column").height();
	var mainHeight = $("#main").height();

	console.log(initialHeight+", "+docHeight+", "+windowHeight+", "+mainHeight);

	if ((initialHeight < windowHeight || mainHeight < windowHeight)) {
		$(".content-column").height(contentHeight+(windowHeight-mainHeight));
	} else {
		initialHeight = $("#main").height();
		//$(".content-column").css("height", "auto");
	}
}

$(function() {
	initialHeight = $("#main").height();

	resize();
	$(window).resize(resize);

	var baseOffset = $("#header").height()+parseInt($("html").css("margin-top"));

	$('.ui.sticky').each(function() {
		var $this = $(this);
		var offset = $this.offset().top;

		console.log("SDFSD: "+offset);

		$this.sticky({
			offset: offset
		});
	});

	$(".item:not(.active)").hover(function() {
		$(this).addClass("active");
	}, function() {
		$(this).removeClass("active");
	});
});
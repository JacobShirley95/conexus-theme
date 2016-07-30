$(function() {
	var baseOffset = $("#header").height()+parseInt($("html").css("margin-top"));

	$('.ui.sticky').each(function() {
		var $this = $(this);
		var offset = $this.offset().top;

		console.log("SDFSD: "+offset);

		//$this.sticky({offset: offset});
	});

	$(".item:not(.active)").hover(function() {
		$(this).addClass("active");
	}, function() {
		$(this).removeClass("active");
	});
});
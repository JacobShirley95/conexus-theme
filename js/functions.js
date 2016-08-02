$(function() {
	var baseOffset = $("#header").height()+parseInt($("html").css("margin-top"));

	$('.ui.sticky').each(function() {
		var $this = $(this);
		var offset = $this.offset().top;

		//$this.sticky({offset: offset});
	});

	/* Due to a bug in Safari and Chrome version less than 51, a height of 100% in flexbox children elements is not honored. Here's my fix for this.*/
	if (platform.name == "Safari" || (platform.name == "Chrome" && parseInt(platform.version) < 51)) {
		console.log(platform);

		var $targetObj = $("#main").children(0);
		var $resizable = $("#main").find(".grid");

		$resizable.height($targetObj.height());
		$(window).resize(function() {
			$resizable.height($targetObj.height());
		});
	}
	

	$(".item:not(.active)").hover(function() {
		$(this).addClass("active");
	}, function() {
		$(this).removeClass("active");
	});
});
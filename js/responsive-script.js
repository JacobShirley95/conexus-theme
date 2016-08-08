function MobileMenu($menu, offset) {
	this.$menu = $menu;
	this.offset = offset;
	
	this.init();
}

MobileMenu.prototype.init = function() {
	var scrollVel = 0;
    var lastScrollY = $(document).scrollTop();

    var height = this.$menu.outerHeight();
    var startPos = parseInt(this.$menu.css("top"));
    var startPos2 = startPos;

    var pos = 0;

    var _this = this;

    this.interval = setInterval(function() {
    	var sc = $(document).scrollTop();
    	scrollVel = sc-lastScrollY;

    	pos = parseInt(_this.$menu.css("top"));

    	if (pos >= startPos-height && pos <= startPos) {
    		if (_this.offset && _this.offset != 0)
	    		if (sc > _this.offset) {
		        	startPos = 0;
		        } else
		        	startPos = startPos2;

    		if (pos - scrollVel < startPos-height) {
    			scrollVel = pos - startPos + height;
    		} else if (pos - scrollVel > startPos) {
    			scrollVel = pos - startPos;
    		}

    		_this.$menu.css({top: "-="+scrollVel});
        }
        
        lastScrollY = sc;
    }, 5);
}

MobileMenu.prototype.refresh = function() {
	this.stop();
	this.init();
}

MobileMenu.prototype.setOffset = function(offset) {
	this.offset = offset;
}

MobileMenu.prototype.stop = function() {
	if (this.interval != -1) {
	    clearInterval(this.interval);
	    this.interval = -1;
	    this.$menu.css({top: "initial"});
	}
}

$(function() {
	var $responsiveColumns = $(".responsive-column");
	var $responsiveToggles = $(".responsive-toggle");
	var $header = $("#header");
	var $footer = $("#footer");

	var mobileMenu = null;

	function getMobileMenu() {
		if (mobileMenu == null)
	        mobileMenu = new MobileMenu($header);

	    return mobileMenu;
	}

	enquire.register("screen and (max-width: 1000px)", {
	    match: function() {
	    	$footer.addClass("secondary-area");

	    	$responsiveToggles.show();

	        $responsiveColumns.removeClass("twelve wide");
	        $responsiveColumns.addClass("sixteen wide");

	        getMobileMenu();
	    },

	    unmatch: function() {
	    	$header.css({top: "initial"});
	    	$footer.removeClass("secondary-area");

	    	$responsiveToggles.hide();

	        $responsiveColumns.removeClass("sixteen wide");
	        $responsiveColumns.addClass("twelve wide");

	        if (mobileMenu != null) {
	        	mobileMenu.stop();
	        	mobileMenu = null;
	        }
	    }
	});

	enquire.register("screen and (max-width: 782px)", {
	    match: function() {
	    	getMobileMenu().refresh();
	    },

	    unmatch: function() {
	    	getMobileMenu().refresh();
	    }
	});

	enquire.register("screen and (max-width: 600px)", {
	    match: function() {
	    	getMobileMenu().setOffset(46);
	    },

	    unmatch: function() {
	    	getMobileMenu().setOffset(0);
	    }
	});
});
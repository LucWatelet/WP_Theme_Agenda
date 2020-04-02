//ready
$(document).ready(function(){
	init();
	if(Modernizr.touchevents) {
		init_mobile();
	}
});

$(window).on("load", function() {
	loaded();
});
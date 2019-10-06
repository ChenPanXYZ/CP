(function($) {
	
	$('#toggle').toggle( 
		function() { 
			$(".popout-panel").fadeIn();
			$(".popout-panel").css('visibility', 'visible');
		}

		, 

		function() {
			$(".popout-panel").fadeOut();
			$(".popout-panel").css('visibility', 'none');
		}
	);


	//Prevent scroll other divs when mouse hover over the panel
	$('.popout-panel').on('mousewheel DOMMouseScroll', function(e) {
		var scrollTo = null;
		if(e.type === 'mousewheel') {
			scrollTo = (e.originalEvent.wheelDelta * -1);
		}
		else if(e.type === 'DOMMouseScroll') {
			scrollTo = 40 * e.originalEvent.detail;
		}

		if(scrollTo) {
			e.preventDefault();
			$(this).scrollTop(scrollTo + $(this).scrollTop());
		}
	});
	
})(jQuery);
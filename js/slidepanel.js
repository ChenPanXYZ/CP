(function($) {
	
	
$('#toggle').toggle( 


    function() {
		$('.popout-panel').css({'top':($('.site-header').height() + $('#wpadminbar').height())});
        $(".popout-panel").show();
    }
	
	, 
    function() {
		$(".popout-panel").hide();
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
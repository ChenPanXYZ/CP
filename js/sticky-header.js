( function( $ ) {
window.onscroll = function() {StickyMenu()};

var header = document.getElementById("main-header");

var sticky = header.offsetTop;   

function StickyMenu() {
  if (window.pageYOffset > sticky) {
	  if (screen.width > "782px")
	  {
		  $('.fixed-at-top').css({'top':($('#wpadminbar').height())});
	  }
	  header.classList.add("fixed-at-top");
	adjustWidth();
  } else {
	  header.classList.remove("fixed-at-top");
  }
}

function adjustWidth() {
	var header = document.getElementById('main-header');
	var site = document.getElementsByClassName('site')[0];
	header.style.width = site.offsetWidth + 'px';
}
} )(jQuery);

(function($, window) {
  var adjustAnchor= function() {

    var $anchor = $(':target'),
    	fixedElementHeight = $('.site-header').height();

    if ($anchor.length > 0) {

      $('html, body')
        .stop()
        .animate({
          scrollTop: $anchor.offset().top - fixedElementHeight
        }, 200);

    }

  };

  $(window).on('hashchange load', function() {
    adjustAnchor();
  });

})(jQuery, window);
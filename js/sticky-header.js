( function( $ ) {
	$('.popout-panel').css({'top':($('.site-header').height())});
	solution_without_admin_bar(); // It is default;
	window.onload = function(){
		if($('#wpadminbar').length == 0) {
			//solution_without_admin_bar();
		}
		else if($(document).width() > 600) {
			$('.popout-panel').css({'top': ($(".site-header").height() + $("#wpadminbar").height())});
			solution_with_fixed_admin_bar();
		}
		else {
			solution_with_admin_bar();
		}
	};
	
	
	function solution_with_fixed_admin_bar(){
		window.onscroll = function() {sticky_menu_with_fixed_admin_bar()};
	}
	
	function sticky_menu_with_fixed_admin_bar(){
		var header = document.getElementById("main-header");
		var sticky = header.offsetTop;
		  if (window.pageYOffset > sticky) {
		  	header.classList.add("fixed-at-top");
			if($(document).width() >= 785){$('.site-header-menu').css({'padding-right': 20});}
			adjustWidth();
		  } 
		else {
		  header.classList.remove("fixed-at-top");
		  $('.site-header-menu').css({'padding-right': 0});
	  	}
	}

	
	
	// Solution with admin bar
	function solution_with_admin_bar(){
		init_header_with_admin_bar();
		window.onscroll = function() {
			var current_state = admin_bar_within_page();
			sticky_menu_with_admin_bar(current_state);
		}
		
	}
	
	
	
	
function admin_bar_within_page() {
	var admin_bar_height = $("#wpadminbar").height();
	if(window.pageYOffset < admin_bar_height) {
		return true;
	}
	else {
		return false;
	}
}
	
function init_header_with_admin_bar() {
	if(admin_bar_within_page()) {
		$('.popout-panel').css({'top': ($("#wpadminbar").height() + $(".site-header").height())}); // Not accurate
	}
	else {
		$('.popout-panel').css({'top': ($(".site-header").height())});
		$('.fixed-at-top').css({'top': 0});
		$('.site-header').css({'top': 0});
		sticky_menu_without_admin_bar();
	}
}
	
	
	


function sticky_menu_with_admin_bar(current_state) {
	if(!current_state){ //admin bar is still within the screen.
		$('.popout-panel').css({'top':($('.site-header').height())});
		$('.fixed-at-top').css({'top': 0});
		$('.site-header').css({'top': 0});
		var header = document.getElementById("main-header");
		var sticky = header.offsetTop;
		  if (window.pageYOffset > sticky) {
		  header.classList.add("fixed-at-top");
		if($(document).width() >= 785){$('.site-header-menu').css({'padding-right': 20});}
		adjustWidth();
	  } else {
		  header.classList.remove("fixed-at-top");
		  $('.site-header-menu').css({'padding-right': 0});
	  }
	}
	
	else {
		
		$('.popout-panel').css({'top': ($(".site-header").height() + $("#wpadminbar").height())});
		sticky_menu_with_fixed_admin_bar();
	}
}
	
	
	
	
	
	
// Solution without admin bar (old solution)
function solution_without_admin_bar(){
	//alert("hi");
	window.onscroll = function() {sticky_menu_without_admin_bar()};
}
function sticky_menu_without_admin_bar(){
	var header = document.getElementById("main-header");
	var sticky = header.offsetTop;
	  if (window.pageYOffset > sticky) {
	  header.classList.add("fixed-at-top");
		if($(document).width() >= 785){$('.site-header-menu').css({'padding-right': 20});}
	adjustWidth();
  } else {
	  header.classList.remove("fixed-at-top");
	  $('.site-header-menu').css({'padding-right': 0});
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
(function($) {

$(window).scroll(function() {
	

    var scrollwin = $(window).scrollTop();
    var entryheight = $('.entry-content').outerHeight(true);
    var windowWidth = $(window).width();
	  $('.read-progress-bar').css('top', $('.site-header').height() + $('#wpadminbar').height());
    if((scrollwin + $('.site-header').height()) >= $('.entry-content').offset().top){
        if((scrollwin + $('.site-header').height()) <= ($('.entry-content').offset().top + entryheight + $('#wpadminbar').height())){
            $('.read-progress-bar').css('width', ((scrollwin - $('.entry-content').offset().top + $('.site-header').height() + $('#wpadminbar').height()) / entryheight) * 100 + "%");
        }else{
            $('.read-progress-bar').css('width',"100%");
        }
    }else{
        $('.read-progress-bar').css('width',"0px");
    }


});

})(jQuery);
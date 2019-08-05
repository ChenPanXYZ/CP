/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
	
	
	
	if($('.site-content').hasClass('sidebar-container')) {
		
	}
	else
	{
		$('body').addClass('no-sidebar');
	}
	

	$('.site-header').css('height', Math.max($('.site-brand').height(), $('.site-header-menu').height()));
	
	
	$('.popout-panel').css({'max-height':'100%'});
	
	$('.popout-panel-container').css({'padding-bottom': $('.site-header').height() });
	
	$('.popout-panel').scroll(function(e) {
		//$('.popout-panel').css({'max-height':(($(window).height())-$('.site-header').height())});
	}); 
	
	
	
	
	

	function initMainNavigation( container ) {

		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		container.find( '.current-menu-ancestor > input' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		} );
	}
	
	//Added button
	initMainNavigation( $( '.nav-menu' ) );
	$( ".dropdown-toggle" ).toggle(function() {
	  $(this).parent().children(".sub-menu").css("display", "block");
	}, function() {
	  $(this).parent().children(".sub-menu").css("display", "none");
});
	
	
} )( jQuery );

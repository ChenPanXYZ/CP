( function( $ ) {
	
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title' ).html( newval );
		} );
	});

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		});
	});
	
  wp.customize( 'primary_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.sticky-post' ).css( 'color', newval );
			$( '.site-title' ).css( 'color', newval );
			$( '.site-title a' ).css( 'color', newval );
			$( '.site-title a' ).css( 'color', newval );
			$( '.entry-title' ).css( 'color', newval );
			$( '.entry-title a' ).css( 'color', newval );
			$( '.widget-title' ).css( 'color', newval );
			$( '.textwidget' ).css( 'color', newval );
			$( '.comments-link::before' ).css( 'color', newval );
			$( '.edit-link::before' ).css( 'olor', newval );
			$( '.recentcomments' ).css( 'color', newval );
			$( '.breadcrumbs-item' ).css( 'color', newval );
			$( '.comment-content' ).css( 'color', newval );
			$( 'article' ).css( 'color', newval );
			$( 'article p' ).css( 'color', newval );
			$( '.entry-content' ).css( 'color', newval );
			$( '.page-title' ).css( 'color', newval );
			$( '.current' ).css( 'color', newval );
			$( '.entry-summary' ).css( 'color', newval );
			$( 'cite' ).css( 'color', newval );
			$( 'li' ).css( 'color', newval );
			$( '.popout-panel' ).css( 'color', newval );
			$( '.nav-menu li a' ).css( 'color', newval );
			$( '#wp-calendar tbody td#today' ).css( 'color', newval );
			$( '#wp-calendar thead th' ).css( 'color', newval );
			$( '#wp-calendar tbody td a,#wp-calendar tfoot td#prev a:hover,#wp-calendar tfoot td#next a:hover' ).css( 'color', newval );
			$( '#wp-calendar tbody td#today' ).css( 'border-color', newval );
			$( '#wp-calendar tbody td a,#wp-calendar tfoot td#prev a:hover,#wp-calendar tfoot td#next a:hover' ).css( 'border-color', newval );
			$( '.aside-location::before' ).css( 'color', newval );
			$( '.aside-weather::before' ).css( 'color', newval );
			$( '.aside-mood::before' ).css( 'color', newval );
			$( '.byline::before' ).css( 'color', newval );
			$( '.posted-on::before' ).css( 'color', newval );
			$( '.cat-links::before' ).css( 'color', newval );
			$( '.tags-links::before' ).css( 'color', newval );
		} );
	} );
	
	
  wp.customize( 'secondary_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).css( 'color', newval );
			$( '.social-navigation a' ).css( 'color', newval );
			$( '.entry-footer a' ).css( 'color', newval );
			$( '.hentry' ).css( 'border-bottom-color', newval );
			$( '.hentry' ).css( 'border-top-color', newval );
			$( '.comment-meta a' ).css( 'color', newval );
			$( '.credit a' ).css( 'color', newval );
			$( 'article ul a' ).css( 'color', newval );
			$( '#wp-calendar tbody td' ).css( 'color', newval );
			$( '#wp-calendar tbody td' ).css( 'border-color', newval );
			$( '.wp-block-quote cite' ).css( 'border-color', newval );
			$( '.wp-block-quote' ).css( 'border-left-color', newval );
			$( '.wp-block-quote' ).css( 'border-right-color', newval );
			$( '.aside-location' ).css( 'color', newval );
			$( '.aside-weather' ).css( 'color', newval );
			$( '.aside-mood' ).css( 'color', newval );
			$( '.aside-archive-container' ).css( 'color', newval );
			$( '#toggle::before' ).css( 'color', newval );
		} );
	} );
	
  wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'a' ).css( 'color', newval );
			$( '.read-progress-bar' ).css( 'background-color', newval );
			$( '.sticky-post' ).css( 'border-bottom-color', newval );
			$( 'article ul a' ).css( 'border-bottom-color', newval );
			$( 'article ul em' ).css( 'border-bottom-color', newval );
		} );
	} );
	
	
  wp.customize( 'back_ground_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'background', newval );
			$( '.fixed-at-top' ).css( 'background', newval );
			$( '.fixed-at-top' ).css( 'background-color', newval );
			$( '#main-header' ).css( 'background-color', newval );
			$( '.wp-block-calendar table th' ).css( 'background-color', newval );
			$( 'textarea, input' ).css( 'background-color', newval );

			
		} );
	} );
	
  wp.customize( 'popout_panel_color', function( value ) {
		value.bind( function( newval ) {
			$( '.popout-panel' ).css( 'background-color', newval );
			
		} );
	} );
	
	
} )( jQuery );
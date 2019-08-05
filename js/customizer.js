( function( $ ) {
	
  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'background-color', newval );
			$( '#main-header' ).css( 'background-color', newval );
		} );
	} );
	
  wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'a' ).css( 'color', newval );
		} );
	} );
	
	
	
  wp.customize( 'secondary_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).css( 'color', newval );
			$( '.entry-footer a' ).css( 'color', newval );
			$( '.social-navigation a' ).css( 'color', newval );
		} );
	} );
	
  wp.customize( 'popout_panel_color', function( value ) {
		value.bind( function( newval ) {
			$( '.popout-panel' ).css( 'background', newval );
		} );
	} );
	
  wp.customize( 'popout_panel_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.widget-title' ).css( 'color', newval );
		} );
	} );
	
	
	
	
	
	wp.customize( 'blogname', function( value ) {
	  value.bind( function( newval ) {
		$( '.site-title' ).html( newval );
	  } );
	} );

	wp.customize( 'blogdescription', function( value ) {
	  value.bind( function( newval ) {
		$( '.site-description' ).html( newval );
	  } );
	} );
	
} )( jQuery );
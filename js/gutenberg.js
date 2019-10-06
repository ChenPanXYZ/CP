( function( $ ) {
	
	$('#today-meta-box').hide();
	
  const {subscribe} = wp.data;
  window.DAIM = {};

  const unssubscribe = subscribe(() => {
	  
    if (wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' ) !== null &&
        window.DAIM.currentFormat !== null &&
        window.DAIM.currentFormat !== wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' )) {

		if(wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' ) == 'aside')
			{
      			$('#today-meta-box').show();
			}
		else
			{
				$('#today-meta-box').hide();
			}
				

    }

    window.DAIM.currentFormat = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' );

  });
	
} )( jQuery );

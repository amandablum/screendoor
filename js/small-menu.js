/**
 * Handles toggling the main navigation menu for small screens.
 */
jQuery( document ).ready( function( $ ) {
	var $displayblock = $( '#displayblock' ),
	    timeout = false;

	$.fn.smallMenu = function() {
		$displayblock.find( '.block').addClass( 'dropdown' );
		

		$( '.dropdown).unbind( 'click' ).click( function() {
			$displayblock.find( '.deliciousimagesoffood' ).toggle();
			$( this ).toggleClass( 'toggled-on' );
		} );
	};

	// Check viewport width on first load.
	if ( $( window ).width() < 600 )
		$.fn.smallMenu();

	// Check viewport width when user resizes the browser window.
	$( window ).resize( function() {
		var browserWidth = $( window ).width();

		if ( false !== timeout )
			clearTimeout( timeout );

		timeout = setTimeout( function() {
			if ( browserWidth < 600 ) {
				$.fn.smallMenu();
			} else {
				$displayblock.find( '.block').removeClass( 'dropdown' );
				$displayblock.find( '.deliciousimagesoffood' ).removeAttr( 'style' );
			}
		}, 200 );
	} );
} );

/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#masthead .site-branding .site-title a, #masthead .site-branding .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '#masthead .site-branding .site-title a, #masthead .site-branding .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	$(document).ready(function() {
		// Give each of the panels a highlight
		$( '.pique-panel' ).not( '#pique-hero' ).each(function() {
			$( this ).append( '<span class="pique-panel-title">' + $( this ).data( 'panel-title' ) + '</span>' );
		});
	});

} )( jQuery );

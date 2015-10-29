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

	// Shaded panels
	wp.customize( 'pique_panel1_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel1 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel1_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel1' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel1' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel2_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel2 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel2_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel2' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel2' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel3_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel3 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel3_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel3' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel3' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel4_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel4 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel4_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel4' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel4' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel5_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel5 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel5_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel5' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel5' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel6_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel6 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel6_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel6' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel6' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel7_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel7 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel7_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel7' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel7' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	wp.customize( 'pique_panel8_opacity', function( value ) {
		value.bind( function( opacity ) {
			$( '.pique-panel8 .pique-panel-background' ).css( {
				'opacity': opacity,
			} );
		} );
	} );

	wp.customize( 'pique_panel8_background', function( value ) {
		value.bind( function( color ) {
			if ( false === color ) {
				$( '.pique-panel8' ).css( {
					'background-color': '',
				} );
			} else {
				$( '.pique-panel8' ).css( {
					'background-color': color,
				} );
			}
		} );
	} );

	$( document ).ready( function() {
		// Give each of the panels a highlight & title
		$( '.pique-frontpage' ).find( '.pique-panel' ).not( '#pique-hero' ).each(function() {
			$( this ).append( '<span class="pique-panel-title">' + $( this ).data( 'panel-title' ) + '</span>' );
		});
	});

} )( jQuery );

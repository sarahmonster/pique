/**
 * Header enhancements for more intelligent dynamic headers.
 *
 * This sets the masthead to the height of an uploaded image and applies sticky navigation.
 */

( function( $ ) {

	// Ensure that header images are no taller than the viewport height
	function fitHeader() {
		var windowHeight = $( window ).height();
		var windowWidth = $( window ).width();
		var navBarHeight = $( '.nav-bar' ).height();
		var wpAdminBar = $( '#wpadminbar' ).height() || 0;
		var effectiveViewportHeight = windowHeight - navBarHeight - wpAdminBar;
		var mastheadImageHeight = $( '#masthead' ).data('image-height');

		// we should only resize for larger devices (tablets and up)
		if ( windowWidth > 640 ) {
			if ( mastheadImageHeight >= effectiveViewportHeight ) {
				$( '#masthead' ).css( 'height', effectiveViewportHeight );
			} else {
				$( '#masthead' ).css( 'height', mastheadImageHeight );
			}
		}
	};

	// Run every time the window is resized
	$(window).on("resize", function () {

		// If we're on the homepage, we'll handle things a little differently
		if ($('body').hasClass('page-template-page-templatestemplate-front-php')) {
			// For teensy little mobile screens, we want to position the nav before the header elements. Let's do it!
			var piqueBrandingHeight = $('#masthead').find('.site-branding').height() + 40;
			var piqueHeroContent = $('#pique-hero').find('.pique-panel-content');
			if( $('#masthead').hasClass('pique-unstuck-header') ) {
				// something
			} else {
				$(piqueHeroContent).css('margin-top', piqueBrandingHeight);
			}

		// If we're not on the front page, we'll measure the height of the header
		// image and the height of our nav to determine our overall header height.
		} else {
			var piqueHeaderHeight = $('#pique-header-image').height();
			var piqueNavHeight = $('#primary-menu').height();
			$('#masthead').css('height', piqueHeaderHeight + piqueNavHeight);
		}

	}).resize(); // fire the resize event at load to size & rearrange elements as needed

} )( jQuery );

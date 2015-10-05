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
		var windowWidth = $( window ).width();
		var headerHeight = $('#pique-header-image').height();
		var navHeight = $('#primary-menu').height();

		// Make sure we're not on the homepage, since that handles stuff differently
		if (!$('body').hasClass('page-template-page-templatestemplate-front-php')) {

			// Is this a small screen? Okay, we should be using a priority+ navigation approach
			if ( windowWidth < 640 ) {
				$('#masthead').css('height', headerHeight);

			// Add the height of our header image and the height of our nav
			} else {
				$('#masthead').css('height', headerHeight + navHeight);
			}
		}

	}).resize(); // fire the resize event at load to size & rearrange elements as needed

} )( jQuery );

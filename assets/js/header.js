/**
 * Header enhancements for more intelligent dynamic headers.
 *
 * This sets the masthead to the height of an uploaded image and applies sticky navigation.
 */

( function( $ ) {

	// Run every time the window is resized
	$(window).on("resize", function () {

		// If we're on the homepage, we'll handle things a little differently
		if ($('body').hasClass('page-template-page-templatestemplate-front-php')) {
			// For teensy little mobile screens, we want to position the nav before the header elements. Let's do it!
			var piqueBrandingHeight = $('#masthead').find('.site-branding').height() + 40;
			var piqueHeroContent = $('#pique-hero').find('.pique-panel-content');
			if( $('#masthead').hasClass('pique-unstuck-header') {

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

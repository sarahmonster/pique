/**
 * Header enhancements for more intelligent dynamic headers.
 *
 * This sets the masthead to the height of an uploaded image and applies sticky navigation.
 */

( function( $ ) {

	// Fit header into the available space
	function fitHeader() {
		var windowWidth = $( window ).width();
		var headerHeight = $('#pique-header-image').height();
		var navHeight = $('#primary-menu').height();

		// Make sure we're not on the homepage, since that handles stuff differently
		if (!$('body').hasClass('pique-frontpage')) {

			// Is this a small screen? Okay, we should be making it a little smaller (no need to account for our nav height here)
			if ( windowWidth < 640 ) {
				$('#masthead').css('height', headerHeight);

			// Add the height of our header image and the height of our nav
			} else {
				$('#masthead').css('height', headerHeight + navHeight);
			}
		}
	};

	// Priority+ navigation, whee!
	function priorityNav() {
		// Don't do it on the homepage, because the homepage is too damned delicate
		if (!$('body').hasClass('pique-frontpage')) {
		  var navWidth = 0;
		  var firstMoreElement = $('#more-menu li').first();

		  // Calculate the width of our "more" containing element
		  var moreWidth = $('#more-menu').outerWidth(true);

		  // Calculate the current width of our navigation
		  $('#site-navigation .menu span > li').each(function() {
		      navWidth += $(this).outerWidth( true );
		  });

		  // Calculate our available space
		  var availableSpace = $('#site-navigation').outerWidth(true) - moreWidth;

		  // If our nav is wider than our available space, we're going to move items
		  if (navWidth > availableSpace) {
			var lastItem = $('#site-navigation .menu span > li:not(#more-menu)').last();
			lastItem.attr('data-width', lastItem.outerWidth(true));
			lastItem.prependTo($('#more-menu .sub-menu').eq(0));
			priorityNav(); // Rerun this function!

			// But if we have the extra space, we should add the items back to our menu
			} else if (navWidth + firstMoreElement.data('width') < availableSpace) {
				// Check to be sure there's enough space for our extra element
				firstMoreElement.insertBefore($('#site-navigation .menu span > li').last());
				priorityNav();
		  }

		  // Hide our more-menu entirely if there's nothing in it
		  if ($('#more-menu li').length > 0) {
		    $('#more-menu').addClass('visible');
		  } else {
		    $('#more-menu').removeClass('visible');
		  }
	  } // check for body class
  }; // function priorityNav

	// Okay, now we want to stick-ify our menu when we reach it
	function stickyNav() {
		if (!$('body').hasClass('pique-frontpage')) {
			$('#site-navigation').waypoint(function() {
				$('#site-navigation').toggleClass('sticky');
			});
		}
	};

	// Run our functions on document load
	$(document).on('ready', function() {
		priorityNav();
		fitHeader();
		stickyNav();
	});

	// Annnnnd also every time the window resizes
	var isResizing = false;
	$(window).on('resize', function() {
		if (isResizing) {
			return;
		}

		isResizing = true;
		setTimeout(function() {
			priorityNav();
			fitHeader();
			isResizing = false;
		}, 150);
	});

} )( jQuery );

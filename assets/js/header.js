/**
 * Header enhancements for more intelligent dynamic headers.
 *
 * This sets the masthead to the height of an uploaded image and applies sticky navigation.
 */

( function( $ ) {
  $(document).ready(function() {
    var piqueHeaderHeight = $('#pique-header-image').height();
    var piqueNavHeight = $('#primary-menu').height();
    $('#masthead').css('height', piqueHeaderHeight + piqueNavHeight);
  });
} )( jQuery );

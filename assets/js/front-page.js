( function( $ ) {
  $(document).ready(function() {

  /*
  // For teensy little mobile screens, we want to position the nav before the header elements. Let's do it!
  var piqueBrandingHeight = $('#masthead').find('.site-branding').height() + 40;
  var piqueHeroContent = $('#pique-hero').find('.pique-panel-content');
  if( $('#masthead').hasClass('pique-unstuck-header') ) {
      // something
  } else {
      $(piqueHeroContent).css('margin-top', piqueBrandingHeight);
  }
  */

  });

  var sections = $('.pique-panel');
  var navLinks = $('#site-navigation li a');

  // Use the Waypoints plugin to indicate our current nav item
  sections.waypoint({
    handler: function(direction) {
        var activePanel = $(this);

        // If we're scrolling up, set the previous panel as our current panel.
        // This just means that, when we hit to top of a panel (bottom of a new panel)
        // we'll highlight the correct panel. Wheee!
        if ('up' === direction) {
            activePanel = activePanel.prev();
        }

        // Get the ID of the panel
        var panelID = this.options.element.id;

        // Find the active panel's corresponding link by matching the panel ID in the URL
        var activeLink = $('nav a[href="#' + panelID + '"]').parent('li');
        // Remove any existing classes
        navLinks.parents('li').removeClass('current_page_item');
        // Highlight the currently active panel by adding a CSS class
        activeLink.addClass('current_page_item');

    },
    offset: '110px'
  });

  // Use scrollTo library to smoothly scroll between panels
  navLinks.click( function() {
   $.scrollTo( $(this).attr('href'), {
       duration: 400,
       offset: { 'top': -80 }
   } );

 });

} )( jQuery );

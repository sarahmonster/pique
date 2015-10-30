( function( $ ) {
  $(document).ready(function() {
    /*var s = skrollr.init();

    //The options (second parameter) are all optional. The values shown are the default values.
    skrollr.menu.init(s, {
        //skrollr will smoothly animate to the new position using `animateTo`.
        animate: true,

        //The easing function to use.
        easing: 'sqrt',

        //Multiply your data-[offset] values so they match those set in skrollr.init
        scale: 2,

        //How long the animation should take in ms.
        duration: function(currentTop, targetTop) {
            //By default, the duration is hardcoded at 500ms.
            return 500;

            //But you could calculate a value based on the current scroll position (`currentTop`) and the target scroll position (`targetTop`).
            //return Math.abs(currentTop - targetTop) * 10;
        },

        //If you pass a handleLink function you'll disable `data-menu-top` and `data-menu-offset`.
        //You are in control where skrollr will scroll to. You get the clicked link as a parameter and are expected to return a number.
        //handleLink: function(link) {
        //    return 400;//Hardcoding 400 doesn't make much sense.
        //},

        //By default skrollr-menu will only react to links whose href attribute contains a hash and nothing more, e.g. `href="#foo"`.
        //If you enable `complexLinks`, skrollr-menu also reacts to absolute and relative URLs which have a hash part.
        //The following will all work (if the user is on the correct page):
        //http://example.com/currentPage/#foo
        //http://example.com/currentDir/currentPage.html?foo=bar#foo
        ///?foo=bar#foo
        complexLinks: false,

        //This event is triggered right before we jump/animate to a new hash.
        change: function(newHash, newTopPosition) {
            //Do stuff
        },

        // Don't append hash link (#post-xxxx) to URL
        updateUrl: true,

        // forceHeight creates an ugly gap at the bottom of the page, so we're disabling it.
        // https://github.com/Prinzhorn/skrollr#forceheighttrue
        forceHeight: false
    });

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

  // Skrollr smells
  var sections = $('.pique-panel');
  var navLinks = $('#site-navigation li a');

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

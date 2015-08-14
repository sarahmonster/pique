( function( $ ) {
  $(document).ready(function() {
    var s = skrollr.init();

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
        updateUrl: true
    });

    /*
     * When the page is first loaded, we want our menu at the bottom.
     * Once we've scrolled past the hero image though, we want the menu
     * to stick to the top of our page instead.
     * We're doing this by using the Waypoints library to calculate where
     * we are in the page, and assign a CSS class accordingly.
     */
    var waypoint = new Waypoint({
      element: document.getElementById( 'pique-hero' ),
      handler: function() {
        $( '#masthead' ).toggleClass( 'pique-unstuck-header' );
        console.log("Switch!");
      },
      offset: -150
    })

    var waypoint = new Waypoint({
      element: document.getElementById( 'pique-hero' ),
      handler: function() {
        $( '#masthead' ).addClass( 'pique-unstuck-header' );
        console.log("Top of page");
      }
    })

  });
} )( jQuery );

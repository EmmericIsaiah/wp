( function() {
    var nav = document.getElementById( 'site-navigation' ), button, menu;
    if ( ! nav ) {
        return;
    }

    button = nav.getElementsByTagName( 'button' )[0];
    menu   = nav.getElementsByTagName( 'ul' )[0];
    if ( ! button ) {
        return;
    }

    // Hide button if menu is missing or empty.
    if ( ! menu || ! menu.childNodes.length ) {
        button.style.display = 'none';
        return;
    }

    button.onclick = function() {
        if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
            menu.className = 'nav-menu';
        }

        if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
            button.className = button.className.replace( ' toggled-on', '' );
            menu.className = menu.className.replace( ' toggled-on', '' );
        } else {
            button.className += ' toggled-on';
            menu.className += ' toggled-on';
        }
    };
} )(jQuery);



jQuery(document).ready(function($) {

});




jQuery(document).ready(function ($) {
    // with jQuery
    var container = jQuery('#grid-container');

    // initialize Masonry after all images have loaded
    container.imagesLoaded( function() {
        container.masonry();
    });

    // This will fire when document is ready:
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if($(window).width() <= 800) { //C'est ici pour fa ire disparaître le menu down en dessus de 800px de large
            jQuery('li.menu-item-has-children>ul').prepend('<button  class="submenu-button">DOWN</button>');
            jQuery('.submenu-button').siblings().hide();
            jQuery('.submenu-button').click( function(){
                jQuery(this).siblings().toggle();
            } );

        } else {
            console.log('test');
        }
    }).resize(); // This will simulate a resize to trigger the initial run.


});

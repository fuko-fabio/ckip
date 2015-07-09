jQuery(function() {

    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = jQuery('.site-header-opts').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(offset){
        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
        var el = jQuery('.site-header-opts');
        // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top + offset) { 
            if (el.css('position') != 'fixed') {
                el.hide();
                el.css({ 'position': 'fixed', 'top' : 0});
                el.slideDown();
            } else {
                el.css({ 'position': 'fixed', 'top' : 0});
            }
        } else {
            el.css({ 'position': 'fixed' });
        }
    };
    
    // run our function on load
    sticky_navigation();
    
    // and run it again every time you scroll
    jQuery(window).scroll(function() {
         sticky_navigation(200);
    });

});
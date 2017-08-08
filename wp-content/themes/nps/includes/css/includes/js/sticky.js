jQuery(function() {

    var el = jQuery('.site-header-opts');
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = el.offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(offset){
        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
        // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top + offset) { 
            if (el.css('position') != 'fixed') {
                el.hide().css({ 'position': 'fixed', 'top' : 0}).slideDown();
            } else {
                el.css({ 'position': 'fixed', 'top' : 0});
            }
        } else {
            if (el.css('position') == 'fixed') {
                el.slideUp(300, function () {
                    el.css({ 'position': 'absolute'}).show();
                });
                
            } else {
                el.css({ 'position': 'absolute'}).show();
            }
        }
    };
    
    // run our function on load
    sticky_navigation();
    
    // and run it again every time you scroll
    jQuery(window).scroll(function() {
         sticky_navigation(400);
    });

});
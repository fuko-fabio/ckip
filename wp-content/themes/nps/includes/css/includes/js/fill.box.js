(function ($, window, document) {
    jQuery.fn.fillBox = function(hoverEffect, touchDevice) {
        this.each(function(){
            var el = jQuery(this),
                src = el.attr('src'),
                parent = el.parent(),
                shadowLayer = 'linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6) ), ',
                background = 'url(' + src +')';

            if (touchDevice) {
                parent.css({
                    'background'          : shadowLayer + background,
                    'background-size'     : 'cover',
                    'background-position' : 'center'
                });
            } else {
                parent.css({
                    'background'          : background,
                    'background-size'     : 'cover',
                    'background-position' : 'center'
                });
                if (hoverEffect) {
                    parent.hover(function(){
                        parent.css({
                            'background'          : shadowLayer + background,
                            'background-size'     : 'cover',
                            'background-position' : 'center'
                        });
                    }, function(){
                        parent.css({
                            'background'          : background,
                            'background-size'     : 'cover',
                            'background-position' : 'center'
                        });
                    });
                }
            }
            el.hide();
        });
    };
}(jQuery, window, document));

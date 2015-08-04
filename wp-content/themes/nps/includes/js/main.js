var isTouchDevice = 'ontouchstart' in document.documentElement;

jQuery(document).ready(function() {

    function initPartnersSlider() {
        jQuery('.slick-list').slick({
            dots: true,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            swipeToSlide: true,
            variableWidth: true,
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                  }
                }
              ]
        });
    }

    initStickyMenu(0);
    initPartnersSlider();
    handeTouchScreen();
    jQuery('.fill-box').fillBox(true, isTouchDevice);
});

function initStickyMenu(offset) {
    window.scrollTo(0, 0);
    jQuery('.site-header-opts').stickyNavbar({
        animDuration: 250,              // Duration of jQuery animation
        startAt: offset,                // Stick the menu at XXXpx from the top of the this() (nav container)
        animateCSS: false,               // AnimateCSS effect on/off
        jqueryEffects: false,
        mobile: false,                  // If false nav will not stick under 480px width of window
        mobileWidth: 992,               // The viewport width (without scrollbar) under which stickyNavbar will not be applied (due usability on mobile devices)
        zindex: 9999,                   // The zindex value to apply to the element: default 9999, other option is "auto"
    });
    jQuery('.sticky-menu ul').slicknav();
}

function initSecondStickyMenu() {
    var topMenu = jQuery('.site-header-opts');
    var secondMenu = jQuery('.site-navigation');
    secondMenu.stickyNavbar({
        startAt: topMenu.height(),                // Stick the menu at XXXpx from the top of the this() (nav container)
        animateCSS: false,               // AnimateCSS effect on/off
        jqueryEffects: false,
        mobile: false,                  // If false nav will not stick under 480px width of window
        mobileWidth: 992,               // The viewport width (without scrollbar) under which stickyNavbar will not be applied (due usability on mobile devices)
        zindex: 9999,                   // The zindex value to apply to the element: default 9999, other option is "auto"
    });
    secondMenu.css({
        'top' : topMenu.height() - 2
    });
}

function handeTouchScreen() {
    if (isTouchDevice) {
        jQuery('.touch-show').each(function(){
           jQuery(this).css({
                'display' : 'block',
            });
        });
    }
}

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
    handleTouchScreen();
    jQuery('.fill-box').fillBox(true, isTouchDevice);
    jQuery('.site-header-opts').show();
});

function initStickyMenu(offset) {
    window.scrollTo(0, 0);
    jQuery('.site-header-opts').stickyNavbar({
        animDuration: 250,
        startAt: offset,
        animateCSS: false,
        jqueryEffects: false,
        mobile: false,
        mobileWidth: 992,
        zindex: 9999,
    });
    jQuery('.sticky-menu ul').slicknav();
}

function handleTouchScreen() {
    if (isTouchDevice) {
        jQuery('.touch-show').each(function(){
           jQuery(this).css({
                'display' : 'block',
            });
        });
    }
}

function goTo(url) {
    window.location = url;
}

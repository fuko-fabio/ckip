var libraryCategoryId = 8;
var ckipCategoryId = 7;
var marathonCategoryId = 9;
var cinemaCategoryId = 10;
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
});

function initPagePosts(postsCategory, blockSelector) {
    var posts = new wp.api.collections.Posts();

    posts.fetch({ data: { filter: {cat: postsCategory, posts_per_page: 4} } }).done(function() {
        var block = jQuery(blockSelector);

        if (posts.isEmpty()) {
            block.append(tmpl("no-home-posts-tmpl"));
        } else {
            block.append(tmpl("home-posts-tmpl", posts.toArray()));
        }
        jQuery('.fill-box').fillBox(true, isTouchDevice);
        handeTouchScreen();
    });
}

function initStickyMenu(offset) {
    jQuery('.site-header-opts').stickyNavbar({
        animDuration: 250,              // Duration of jQuery animation
        startAt: offset,                // Stick the menu at XXXpx from the top of the this() (nav container)
        easing: "linear",               // Easing type if jqueryEffects = true, use jQuery Easing plugin to extend easing types - gsgd.co.uk/sandbox/jquery/easing
        animateCSS: true,               // AnimateCSS effect on/off
        animateCSSRepeat: false,        // Repeat animation everytime user scrolls
        jqueryAnim: "slideDown",        // jQuery animation type: fadeIn, show or slideDown
        mobile: false,                  // If false nav will not stick under 480px width of window
        mobileWidth: 480,               // The viewport width (without scrollbar) under which stickyNavbar will not be applied (due usability on mobile devices)
        zindex: 9999,                   // The zindex value to apply to the element: default 9999, other option is "auto"
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

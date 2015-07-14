var libraryCategoryId = 8;
var ckipCategoryId = 7;
var marathonCategoryId = 9;
var cinemaCategoryId = 10;

jQuery(document).ready(function() {

    var partnersSlick;

    function initPartnersSlider() {
        jQuery('.slick-list').slick({
            dots: true,
            infinite: true,
            slidesToShow: countImagesToShow(),
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            swipeToSlide: true
        });
        partnersSlick = jQuery('.slick-list').slick("getSlick");
    }
    
    function countImagesToShow() {
        var viewport = jQuery( window ).width();
        var count = 1;
        if (viewport >= 1200) {
            count = 6;
        } else if (viewport >= 992) {
            count = 5;
        } else if (viewport >= 768) {
            count = 4;
        } else {
            count = 2;
        }
        return count;
    }

    initPartnersSlider();
    jQuery(window).resize(function () {
        partnersSlick.setOption("slidesToShow", countImagesToShow(), true);
    });
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
    });
}


var libraryCategoryId = 8;
var ckipCategoryId = 7;
var marathonCategoryId = 9;

var ckipPosts;
var libraryPosts;
var marathonPosts;

jQuery(document).ready(function() {
    if (jQuery('.sidebar').length == 0) {
        jQuery('.main-content-inner').removeClass('col-lg-8');
    }

    ckipPosts = new wp.api.collections.Posts();
    libraryPosts = new wp.api.collections.Posts();
    marathonPosts = new wp.api.collections.Posts();
    
    fetchHomePosts().done(function() {
        renderHomePosts();
        initHomePostsControls();
    });
});

function fetchHomePosts() {
    return jQuery.when(
        ckipPosts.fetch({ data: { filter: {cat: ckipCategoryId, posts_per_page: 4} } }),
        libraryPosts.fetch({ data: { filter: {cat: libraryCategoryId, posts_per_page: 4} } }),
        marathonPosts.fetch({ data: { filter: {cat: marathonCategoryId, posts_per_page: 4} } })
    );
}

function initHomePostsControls() {
    var mainBtn = jQuery('.posts-main-btn');
    var mainBlock = jQuery('.block-posts-categories');
    var ckipBlock = jQuery('.block-ckip');
    var libraryBlock = jQuery('.block-library');
    var marathonBlock = jQuery('.block-marathon');

    mainBtn.click(function() {
        ckipBlock.slideUp();
        libraryBlock.slideUp();
        marathonBlock.slideUp();
        mainBlock.slideDown();
    });
    function initBlockBtn(btn, block) {
        jQuery(btn).click(function() {
            mainBlock.slideUp();
            block.slideDown();
        });
    }
    initBlockBtn('.block-ckip-btn', ckipBlock);
    initBlockBtn('.block-library-btn', libraryBlock);
    initBlockBtn('.block-marathon-btn', marathonBlock);
}

function renderHomePosts() {
    
}


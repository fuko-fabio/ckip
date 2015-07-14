
var libraryCategoryId = 8;
var ckipCategoryId = 7;
var marathonCategoryId = 9;
var cinemaCategoryId = 10;

var ckipPosts;
var libraryPosts;
var marathonPosts;
var cinemaPosts;
var events;

jQuery(document).ready(function() {
    if (jQuery('.sidebar').length == 0) {
        jQuery('.main-content-inner').removeClass('col-lg-8');
    }

    ckipPosts = new wp.api.collections.Posts();
    libraryPosts = new wp.api.collections.Posts();
    marathonPosts = new wp.api.collections.Posts();
    cinemaPosts = new wp.api.collections.Posts();
    events = new wp.api.collections.Posts();
    
    fetchHomeData().done(function() {
        renderHomePosts();
    });
});

function fetchHomeData() {
    return jQuery.when(
        ckipPosts.fetch({ data: { filter: {cat: ckipCategoryId, posts_per_page: 3} } }),
        libraryPosts.fetch({ data: { filter: {cat: libraryCategoryId, posts_per_page: 3} } }),
        marathonPosts.fetch({ data: { filter: {cat: marathonCategoryId, posts_per_page: 3} } }),
        cinemaPosts.fetch({ data: { filter: {cat: cinemaCategoryId, posts_per_page: 3} } }),
        events.fetch({ data: { filter: {type: 'tribe_events', posts_per_page: 4} } })
    );
}

function renderHomePosts() {
    var mainBtn = jQuery('.posts-main-btn');
    var mainTitle= jQuery('.posts-title-all');
    var mainBlock = jQuery('.block-posts-categories');
    var ckipBlock = jQuery('.block-ckip');
    var libraryBlock = jQuery('.block-library');
    var marathonBlock = jQuery('.block-marathon');
    var cinemaBlock = jQuery('.block-cinema');

    function initBlockBtn(name, block) {
        jQuery('.block-' + name + '-btn').click(function() {
            mainBlock.slideUp();
            mainTitle.slideUp();
            block.slideDown();
            jQuery('.posts-title-' + name).slideDown();
        });
        mainBtn.click(function() {
            jQuery('.block-' + name).slideUp();
            jQuery('.posts-title-' + name).slideUp();
            mainBlock.slideDown();
            mainTitle.slideDown();
        });
    }
    function fillBlock(block, posts) {
        if (posts.isEmpty()) {
            block.append(tmpl("no-home-posts-tmpl"));
        } else {
            block.append(tmpl("home-posts-tmpl", posts.toArray()));
        }
    }
    initBlockBtn('ckip', ckipBlock);
    initBlockBtn('library', libraryBlock);
    initBlockBtn('marathon', marathonBlock);
    initBlockBtn('cinema', cinemaBlock);

    fillBlock(ckipBlock, ckipPosts);
    fillBlock(libraryBlock, libraryPosts);
    fillBlock(cinemaBlock, cinemaPosts);
    fillBlock(marathonBlock, marathonPosts);
}

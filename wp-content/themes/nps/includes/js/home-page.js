
jQuery(document).ready(function() {
    var ckipPosts = new wp.api.collections.Posts();
    var libraryPosts = new wp.api.collections.Posts();
    var marathonPosts = new wp.api.collections.Posts();
    var cinemaPosts = new wp.api.collections.Posts();
    var events = new wp.api.collections.Posts();

    function fetchHomeData() {
        return jQuery.when(
            ckipPosts.fetch({ data: { filter: {cat: ckipCategoryId, posts_per_page: 4} } }),
            libraryPosts.fetch({ data: { filter: {cat: libraryCategoryId, posts_per_page: 4} } }),
            marathonPosts.fetch({ data: { filter: {cat: marathonCategoryId, posts_per_page: 4} } }),
            cinemaPosts.fetch({ data: { filter: {cat: cinemaCategoryId, posts_per_page: 4} } }),
            events.fetch({ data: { filter: {type: 'tribe_events', posts_per_page: 4} } })
        );
    }

    function renderHomePosts() {
        var speed = 800;
        var mainBtn = jQuery('.posts-main-btn');
        var mainTitle= jQuery('.posts-title-all');
        var mainBlock = jQuery('.block-posts-categories');
        var ckipBlock = jQuery('.block-ckip');
        var libraryBlock = jQuery('.block-library');
        var marathonBlock = jQuery('.block-marathon');
        var cinemaBlock = jQuery('.block-cinema');

        function initBlockBtn(name, block) {
            jQuery('.block-' + name + '-btn').click(function() {
                mainBlock.slideUp(speed);
                mainTitle.slideUp(speed);
                block.slideDown(speed);
                jQuery('.posts-title-' + name).slideDown(speed);
            });
            mainBtn.click(function() {
                jQuery('.block-' + name).slideUp(speed);
                jQuery('.posts-title-' + name).slideUp(speed);
                mainBlock.slideDown(speed);
                mainTitle.slideDown(speed);
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
        jQuery('.fill-box').fillBox(true, isTouchDevice);
        handeTouchScreen();
    }

    fetchHomeData().done(function() {
        renderHomePosts();
    });

});


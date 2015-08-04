
jQuery(document).ready(function() {

    function initPostsSwitcher() {
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
                block.slideDown(speed);
                jQuery('.posts-title-' + name).slideDown(speed);
                jQuery(".posts-title-all").scrollintoview();
            });
            mainBtn.click(function() {
                jQuery('.block-' + name).slideUp(speed);
                jQuery('.posts-title-' + name).slideUp(speed);
                mainBlock.slideDown(speed);
                jQuery(".posts-title-all").scrollintoview();
            });
        }

        initBlockBtn('ckip', ckipBlock);
        initBlockBtn('library', libraryBlock);
        initBlockBtn('marathon', marathonBlock);
        initBlockBtn('cinema', cinemaBlock);

        jQuery('.fill-box').fillBox(true, isTouchDevice);
        handeTouchScreen();
    }

    initPostsSwitcher();
});


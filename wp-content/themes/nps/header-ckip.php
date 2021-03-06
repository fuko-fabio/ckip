<?php
/**
 * The Main Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package nps
 */

echo get_template_part('head');

?>

<header id="masthead" class="site-header" role="banner">
    <div class="site-header-opts">
        <div class="container">
            <?php
                get_main_sticky_menu();
                get_main_user_bar('ckip');
            ?>
        </div>
    </div><!-- .container -->
    <div class="site-header-image">
        <div class="container">
            <?php get_header_inner_image('ckip'); ?>
            <div class="row">
                <div class="overlay-header ckip-overlay col-12">
                <img class="ckip-logo" src="<?php echo esc_url(get_template_directory_uri().'/includes/img/ck_logo_white.png'); ?>" />
                </div>
            </div>
            <?php get_page_hits('ckip-page-hits'); ?>
        </div>
    </div>
</header><!-- #masthead -->

<?php
    get_site_header_navigation('ckip');
    get_before_body();
?>

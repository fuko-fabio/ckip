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
                get_main_user_bar('library');
            ?>
        </div>
    </div>
    <div class="site-header-image">
        <div class="container">
            <?php get_header_inner_image('library'); ?>
            <div class="row">
                <div class="overlay-header library-overlay col-12">
                <img class="library-logo" src="<?php echo esc_url(get_template_directory_uri().'/includes/img/library_logo.png'); ?>" />
                </div>
            </div>
            <?php get_library_hours('hidden-xs'); ?>
            <?php get_page_hits('library-page-hits'); ?>
        </div>
    </div>
    </div>
</header><!-- #masthead -->

<?php
    get_site_header_navigation('library');
    get_before_body();
?>

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
                get_main_user_bar();
            ?>
        </div>
    </div><!-- .container -->
    <div class="site-header-image">
        <div class="container">
            <?php get_header_inner_image('cinema'); ?>
            <div class="row">
                <div class="overlay-header col-12">
                <img src="<?php echo esc_url(get_template_directory_uri().'/includes/img/cinema_logo.png'); ?>" />
                <span><?php _e( 'Cinema', 'nps' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->

<?php
    get_site_header_navigation('cinema');
    get_before_body();
?>

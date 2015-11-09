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
                get_main_user_bar();
            ?>
        </div>
    </div><!-- .container -->
    <div class="site-header-image">
    <?php if ( !wp_is_mobile() ) { ?>
        <div class="container">
            <div class="row">
            <?php echo do_shortcode("[huge_it_slider id='".get_theme_mod('home_slider_id', '1')."']"); ?>
            </div>
        </div>
    <?php } ?>
    </div>
</header><!-- #masthead -->

<?php
    get_site_header_navigation('home', 1);
    get_before_body();
?>

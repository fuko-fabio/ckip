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
                <div class="overlay-header col-12">
                <img src="<?php echo esc_url(get_template_directory_uri().'/includes/img/library_logo.png'); ?>" />
                <span><?php _e( 'Library', 'nps' ); ?></span>
                </div>
            </div>
            <div class="hours">
                <div class="content">
                    <div class="row header">
                        <div class="col-xs-12"><?php _e( 'Working hours', 'nps' ); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Monday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">10:00 - 18:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Thursday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">08:00 - 19:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Wensday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">08:00 - 18:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Tuesday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">08:00 - 19:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Friday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">08:00 - 18:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 day"><?php _e( 'Saturday', 'nps' ); ?></div>
                        <div class="col-xs-6 hour">08:00 - 16:00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header><!-- #masthead -->

<?php
    get_site_header_navigation('library');
    get_before_body();
?>

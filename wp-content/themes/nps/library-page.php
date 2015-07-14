<?php
/*
Template Name: Library Home Page
*/
?>

<?php get_header('library'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/library-page.js"></script>

<div class="row library-top">
    <div class="col-md-4 hours">
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
                <div class="col-xs-6 hour">08:00 - 15:03</div>
            </div>
            <div class="row">
                <div class="col-xs-6 day"><?php _e( 'Wensday', 'nps' ); ?></div>
                <div class="col-xs-6 hour">08:00 - 16:00</div>
            </div>
            <div class="row">
                <div class="col-xs-6 day"><?php _e( 'Tuesday', 'nps' ); ?></div>
                <div class="col-xs-6 hour">10:00 - 18:00</div>
            </div>
            <div class="row">
                <div class="col-xs-6 day"><?php _e( 'Friday', 'nps' ); ?></div>
                <div class="col-xs-6 hour">08:00 - 15:30</div>
            </div>
        </div>
    </div>
    <div class="col-md-5 catalogue">
        <a href="#" class="content">
            <span class="icon"></span>
            <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
        </a>
    </div>
    <div class="col-md-3">
        <a href="http://www.ibuk.pl/"><img src="<?php echo esc_url(get_template_directory_uri().'/includes/img/partners/ibuk.png') ?>" /></a>
        <a href="https://www.bip.gov.pl/"><img src="<?php echo esc_url(get_template_directory_uri().'/includes/img/partners/bip.png') ?>" /></a>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-library"></div>

<?php get_footer(); ?>
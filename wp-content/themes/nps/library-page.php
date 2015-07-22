<?php
/*
Template Name: Library Home Page
*/
?>

<?php get_header('library'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/library-page.js"></script>

<div class="row library-top">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#">
            <span class="col-xs-12 agency">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Raciborowice', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-6">
        <a href="#">
            <span class="col-xs-12 catalogue">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
            </span>
        </a>
        <a href="http://www.ibuk.pl/">
            <span class="col-xs-12 ibuk"><span class="icon"></span></span>
        </a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#">
            <span class="col-xs-12 agency">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Więcławice', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-xs-12">
        <a href="#">
            <span class="col-xs-12 catalogue">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Online library catalogue', 'nps' ); ?></span>
            </span>
        </a>
        <a href="http://www.ibuk.pl/">
            <span class="col-xs-12 ibuk"><span class="icon"></span></span>
        </a>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-library"></div>

<?php get_footer(); ?>
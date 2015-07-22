<?php
/*
Template Name: Marathon Home Page
*/
?>

<?php get_header('marathon'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/marathon-page.js"></script>

<div class="row marathon-top">
    <div class="col-md-4 col-xs-12">
        <a href="#">
            <span class="col-xs-12 form">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Application form', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-4 col-xs-12">
        <a href="#">
            <span class="col-xs-12 map">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Marathon map', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-4 col-xs-12">
        <a href="#">
            <span class="col-xs-12 scores">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Results', 'nps' ); ?></span>
            </span>
        </a>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-marathon"></div>

<?php get_template_part( 'content', 'single' ); ?>

<?php get_footer(); ?>
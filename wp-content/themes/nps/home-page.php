<?php
/*
Template Name: Main Home Page
*/
?>

<?php get_header('home'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/home-page.js"></script>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="block-posts-categories">
    <div class="col-sm-6 col-xs-12">
        <div class="row block block-ckip-btn">
            <span class="block-title"><?php _e( 'Culture center', 'nps' ); ?></span>
        </div>
        <div class="row block block-library-btn">
            <span class="block-title"><?php _e( 'Library', 'nps' ); ?></span>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="row block block-cinema-btn">
            <span class="block-title"><?php _e( 'Cinema', 'nps' ); ?></span>
        </div>
        <div class="row block block-marathon-btn">
            <span class="block-title"><?php _e( 'Marathon', 'nps' ); ?></span>
        </div>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-ckip" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Culture center', 'nps' ); ?></h3>
<div class="row block-posts block-ckip" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-library" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Library', 'nps' ); ?></h3>
<div class="row block-posts block-library" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-cinema" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Cinema', 'nps' ); ?></h3>
<div class="row block-posts block-cinema" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-marathon" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Marathon', 'nps' ); ?></h3>
<div class="row block-posts block-marathon" style="display: none;"></div>

<?php get_footer(); ?>
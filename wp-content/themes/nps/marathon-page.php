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

<h3 class="home-head"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-marathon">
    <?php get_category_posts('marathon_category', __( 'No posts about marathon.', 'nps' ) ) ?>
</div>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
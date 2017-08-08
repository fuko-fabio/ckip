<?php
/*
Template Name: Marathon Home Page
*/
?>

<?php get_header('marathon'); ?>

<div class="row marathon-top">
    <div class="col-md-4 col-xs-12">
        <a href="<?php echo get_theme_mod('marathon_registration_page', '#') ?>">
            <span class="col-xs-12 form">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Application form', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-4 col-xs-12">
        <a href="<?php echo get_page_link( get_theme_mod('mm_page', '0') )?>">
            <span class="col-xs-12 map">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Marathon map', 'nps' ); ?></span>
            </span>
        </a>
    </div>
    <div class="col-md-4 col-xs-12">
        <a href="<?php echo get_page_link( get_theme_mod('mr_page', '0') )?>">
            <span class="col-xs-12 scores">
                <span class="icon"></span>
                <span class="name"><?php _e( 'Results', 'nps' ); ?></span>
            </span>
        </a>
    </div>
</div>
<a href="<?php echo get_category_link( get_theme_mod('marathon_category', '0') ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'News', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-posts block-marathon">
    <?php get_category_posts('marathon_category', __( 'No posts about marathon.', 'nps' ) ) ?>
</div>
<hr class="separator"/>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
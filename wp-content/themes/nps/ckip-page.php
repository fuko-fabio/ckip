<?php
/*
Template Name: CKiP strona główna
*/
?>

<?php get_header('ckip'); ?>

<a href="<?php echo get_category_link( get_theme_mod('ck_category', '0') ); ?>" class="section-heading">
    <h3 class="home-head"><?php _e( 'News', 'nps' ); ?><span class="pull-right"><?php _e( 'See all', 'nps' ); ?> <i class="fa fa-chevron-right"></i></span></h3>
</a>
<div class="row block-posts block-ckip">
    <?php get_category_posts('ck_category', __( 'No posts about culture center.', 'nps' ) ) ?>
</div>
<hr class="separator"/>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer('ckip'); ?>
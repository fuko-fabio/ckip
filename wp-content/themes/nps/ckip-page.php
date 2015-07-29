<?php
/*
Template Name: CKiP Home Page
*/
?>

<?php get_header('ckip'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/ckip-page.js"></script>

<h3 class="home-head"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-ckip">
    <?php get_category_posts('ck_category', __( 'No posts about culture center.', 'nps' ) ) ?>
</div>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
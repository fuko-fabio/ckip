<?php
/*
Template Name: Kino strona główna
*/
?>

<?php get_header('cinema'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/cinema-page.js"></script>

<h3 class="home-head"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-ckip">
    <?php get_category_posts('cinema_category', __( 'No posts about cinema.', 'nps' ) ) ?>
</div>
<hr class="separator"/>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'custom-single' ); ?>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
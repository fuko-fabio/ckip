<?php
/*
Template Name: Library Home Page
*/
?>

<?php get_header('library'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/library-page.js"></script>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-library"></div>

<?php get_footer(); ?>
<?php
/*
Template Name: Marathon Home Page
*/
?>

<?php get_header('marathon'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/marathon-page.js"></script>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-marathon"></div>

<?php get_footer(); ?>
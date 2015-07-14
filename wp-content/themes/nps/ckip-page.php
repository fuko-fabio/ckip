<?php
/*
Template Name: CKiP Home Page
*/
?>

<?php get_header('ckip'); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/ckip-page.js"></script>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="row block-posts block-ckip"></div>

<?php get_footer(); ?>
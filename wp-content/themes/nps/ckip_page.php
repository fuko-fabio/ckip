<?php
/*
Template Name: CKiP Home Page
*/
?>

<?php get_header(); ?>

<script type="text/x-tmpl" id="home-posts-tmpl">
    {% for (var i=0; i < o.length; i++) { %}
        <div class="col-4">
            <h4 class="title">{%=o[i]['attributes']['title']%}</h4>
            {% if (o[i]['attributes']['featured_image'] != null ) { %}
                {%#o[i]['attributes']['featured_image']['content']%}
            {% } %}
            <span class="content">{%#o[i]['attributes']['excerpt']%}</span>
            <a href="{%=o[i]['attributes']['link']%}" class="btn btn-default"><?php _e( 'See more', 'nps' ); ?></a>
        </div>
    {% } %}
</script>
<script type="text/x-tmpl" id="no-home-posts-tmpl">
    <div class="alert alert-info"><?php _e( 'No posts in this category.', 'nps' ); ?></div>
</script>

<h3 class="home-head posts-main-btn posts-title-all"><?php _e( 'News', 'nps' ); ?></h3>
<div class="block-posts-categories">
    <div class="col-6">
        <div class="row block block-ckip-btn">
            <span class="block-title"><?php _e( 'Culture center', 'nps' ); ?></span>
        </div>
        <div class="row block block-library-btn">
            <span class="block-title"><?php _e( 'Library', 'nps' ); ?></span>
        </div>
    </div>
    <div class="col-6">
        <div class="row block block-cinema-btn">
            <span class="block-title"><?php _e( 'Cinema', 'nps' ); ?></span>
        </div>
        <div class="row block block-marathon-btn">
            <span class="block-title"><?php _e( 'Marathon', 'nps' ); ?></span>
        </div>
    </div>
</div>

<h3 class="home-head posts-main-btn posts-title-ckip" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Culture center', 'nps' ); ?></h3>
<div class="block-posts block-ckip" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-library" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Library', 'nps' ); ?></h3>
<div class="block-posts block-library" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-cinema" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Cinema', 'nps' ); ?></h3>
<div class="block-posts block-cinema" style="display: none;"></div>

<h3 class="home-head posts-main-btn posts-title-marathon" style="display: none;"><?php _e( 'News', 'nps' ); ?> <span class="glyphicon glyphicon-chevron-right"></span> <?php _e( 'Marathon', 'nps' ); ?></h3>
<div class="block-posts block-marathon" style="display: none;"></div>

<?php get_footer(); ?>
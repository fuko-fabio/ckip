<?php
/**
 * The Head for our theme.
 *
 * Displays all of the <head> section
 *
 * @package nps
 */

global $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<script type="text/x-tmpl" id="home-posts-tmpl">
    {% for (var i=0; i < o.length; i++) { %}
        <div class="col-md-3 col-sm-6 col-xs-12 post">
            <div class="content">
                <p class="title">{%=o[i]['attributes']['title']%}</p>
                {% if (o[i]['attributes']['featured_image'] != null ) { %}
                    <img class="fill-box" src="{%=o[i]['attributes']['featured_image']['guid']%}" />
                {% } %}
                <span class="preview touch-show">{%#o[i]['attributes']['excerpt']%}</span>
                <a href="{%=o[i]['attributes']['link']%}" class="btn btn-default touch-show"><?php _e( 'See more', 'nps' ); ?></a>
                <p class="posted"><?php _e( 'Posted on', 'nps' ); ?>: {%=o[i]['attributes']['date'].toLocaleTimeString()%} {%=o[i]['attributes']['date'].toLocaleDateString()%}</p>
            </div>
        </div>
    {% } %}
</script>

<script type="text/x-tmpl" id="no-home-posts-tmpl">
    <div class="col-xs-12">
        <div class="alert alert-info"><?php _e( 'No posts in this category.', 'nps' ); ?></div>
    </div>
</script>

<body <?php body_class(); ?>>
    <?php
        do_action( 'before' );
        get_search_form(); ?>

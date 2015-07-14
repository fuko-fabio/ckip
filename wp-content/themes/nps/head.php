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
        <div class="col-md-3 col-xs-6">
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
    <div class="col-xs-12">
        <div class="alert alert-info"><?php _e( 'No posts in this category.', 'nps' ); ?></div>
    </div>
</script>

<body <?php body_class(); ?>>
    <?php
        do_action( 'before' );
        get_search_form(); ?>

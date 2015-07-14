<?php
/**
 * The template for displaying search forms in nps
 *
 * @package nps
 */
?>
<div class="overlay overlay-hugeinc">
    <button type="button" class="fa fa-remove overlay-close"></button>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <p><?php _ex( 'Search on page', 'label', 'nps' ); ?></p>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'nps' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'nps' ); ?>">
        <i class="fa fa-search">
            <input type="submit" class="search-submit" value="">
        </i>
    </form>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/search.js"></script>

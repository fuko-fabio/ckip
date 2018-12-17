<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

wc_print_notices();
?>

<p class="alert alert-info cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

<p class="return-to-shop">
    <a class="button wc-backward" href="<?php echo get_site_url().'/'.Tribe__Events__Main::instance()->getOption( 'eventsSlug', 'events' ); ?>"><?php _e( 'Return To Events', 'nps' ) ?></a>
</p>

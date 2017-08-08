<?php
/**
 * Empty cart page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<p class="alert alert-info cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop">
    <a class="button wc-backward" href="<?php echo get_site_url().'/'.Tribe__Events__Main::instance()->getOption( 'eventsSlug', 'events' ); ?>"><?php _e( 'Return To Events', 'nps' ) ?></a>
</p>

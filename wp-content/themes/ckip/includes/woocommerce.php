<?php
/**
 * Woocommerce functions and definitions
 *
 * @package nps
 */

function woocommerce_cart_link() {
    global $woocommerce;
    ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'npstheme'); ?>" class="cart-parent">
        <!--
            <span class="contents"><?php echo $woocommerce->cart->get_cart_contents_count() ?></span>
            <span class="total"><?php echo $woocommerce->cart->get_cart_total() ?></span>
        -->
        <i class="glyphicon glyphicon-shopping-cart"></i>
    </a>
    <?php
}

function woocommerce_my_account_link() {
     if ( is_user_logged_in() ) { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','npstheme'); ?>" class="my-account"><i class="glyphicon glyphicon-user"></i></a>
     <?php } 
     else { ?>
        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','npstheme'); ?>" class="my-account"><i class="glyphicon glyphicon-user"></i></a>
     <?php }
}

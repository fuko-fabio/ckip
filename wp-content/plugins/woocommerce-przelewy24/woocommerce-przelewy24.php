<?php
/*
Plugin Name: WooCommerce Przelewy24
Description: Extends WooCommerce by Adding the Przelewy24 payment Gateway.
Version: 1.0.0
Author: Norbert Pabian
Author URI: http://npsoftware.pl
*/

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action( 'plugins_loaded', 'nps_przelewy24_init', 0 );
function nps_przelewy24_init() {
    // If the parent WC_Payment_Gateway class doesn't exist
    // it means WooCommerce is not installed on the site
    // so do nothing
    if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

    load_plugin_textdomain( 'nps-przelewy24', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );

    // If we made it this far, then include our Gateway Class
    include_once( 'includes/class-wc-gateway-przelewy24.php' );
 
    // Now that we have successfully included our class,
    // Lets add it too WooCommerce
    add_filter( 'woocommerce_payment_gateways', 'nps_przelewy24_gateway' );
    function nps_przelewy24_gateway( $methods ) {
        $methods[] = 'WC_Gateway_Przelewy24';
        return $methods;
    }
}
 
// Add custom action links
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'nps_przelewy24_action_links' );
function nps_przelewy24_action_links( $links ) {
    $plugin_links = array(
        '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout' ) . '">' . __( 'Settings', 'nps-przelewy24' ) . '</a>',
    );

    // Merge our new link with the default ones
    return array_merge( $plugin_links, $links );
}
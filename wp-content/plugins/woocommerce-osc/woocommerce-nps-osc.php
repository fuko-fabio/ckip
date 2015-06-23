<?php
/*
Plugin Name: WooCommerce Order State Controll
Description: WooCommerce Order State Controll plugin allows you to automagicaly change oster state to complete based on user preferences
Author: Norbert Pabian
Author URI: http://npsoftware.pl
Version: 1.0.0

Copyright: © 2015 Norbert Pabian (email : norbert.pabian@gmial.com)

*/
if (!defined('ABSPATH'))
    die('-1');

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (!class_exists('WC_Osc')) {
        load_plugin_textdomain('wc_osc', false, dirname(plugin_basename(__FILE__)) . '/');
        include_once ('includes/woocommerce-osc.php');
        $GLOBALS['wc_osc'] = new WC_Osc();
    }
}

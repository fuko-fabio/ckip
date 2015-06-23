<?php
/**
 * Plugin implementation
 *
 * @author Norbert Pabian
 */

// Don't load directly
if (!defined('ABSPATH'))
    die('-1');

if (!class_exists('WC_Osc')) {
    class WC_Osc {
        public function __construct() {
            if (is_admin()) {
                add_filter('woocommerce_payment_gateways_settings', array(&$this, 'general_settings'));
            }
            add_filter('woocommerce_order_item_needs_processing', array(&$this, 'order_item_needs_processing'));
        }

        public function order_item_needs_processing($needs_processing, $product) {
            switch (get_option('woocommerce_osc')) {
                case 'virtual':
                    return !$product->is_virtual();
                case 'downloadable':
                    return !$product->is_downloadable();
                default:
                    return $needs_processing;
            }
        }

        function general_settings($settings, $current_section) {
            $settings_osc = array();
            $settings_osc[] = array(
                'name' => __( 'Order State Controll', 'wc_osc' ),
                'type' => 'title',
                'desc' => __( 'The following options are used to configure WC Slider', 'wc_osc' ),
                'id' => 'wcosc' );
            $settings_osc[] = array(
                'title'    => __( 'Auto change order state', 'wc_osc' ),
                'desc'     => __( 'This option lets you automagicaly change order state to complete based on settings.', 'wc_osc' ),
                'id'       => 'woocommerce_osc',
                'default'  => 'none',
                'type'     => 'select',
                'class'    => 'wc-enhanced-select',
                'css'      => 'min-width: 350px;',
                'desc_tip' =>  true,
                'options'  => array(
                    'default' => __( 'Default', 'wc_osc' ),
                    'virtual' => __( 'Change for virtual products', 'wc_osc' ),
                    'downloadable' => __( 'Change for downloadable products', 'wc_osc' ),
                )
            );
            $settings_osc[] = array( 'type' => 'sectionend', 'id' => 'wcosc' );
            return array_merge($settings, $settings_osc);
        }
    }

}

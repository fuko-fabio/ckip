<?php

if (!defined('ABSPATH')) {
    exit ;
    // Exit if accessed directly
}

abstract class WC_Gateway_Przelewy24_Response {

    /**
     * Get the order from the Przelewy24 'Custom' variable
     *
     * @param  string $custom
     * @return bool|WC_Order object
     */
    protected function get_przelewy24_order($custom) {
        $custom = maybe_unserialize($custom);

        if (is_array($custom)) {

            list($order_id, $order_key, $timestamp) = $custom;

            if (!$order = wc_get_order($order_id)) {
                // We have an invalid $order_id, probably because invoice_prefix has changed
                $order_id = wc_get_order_id_by_order_key($order_key);
                $order = wc_get_order($order_id);
            }

            if (!$order || $order -> order_key !== $order_key) {
                WC_Gateway_Przelewy24::log('Error: Order Keys do not match.');
                return false;
            }

        } elseif (!$order = apply_filters('woocommerce_get_przelewy24_order', false, $custom)) {
            WC_Gateway_Przelewy24::log('Error: Order ID and key were not found in "p24_session_id".');
            return false;
        }

        return $order;
    }

    /**
     * Complete order, add transaction ID and note
     * @param  WC_Order $order
     * @param  string $txn_id
     * @param  string $note
     */
    protected function payment_complete($order, $txn_id = '', $note = '') {
        $order -> add_order_note($note);
        $order -> payment_complete($txn_id);
    }

    /**
     * Hold order and add note
     * @param  WC_Order $order
     * @param  string $reason
     */
    protected function payment_on_hold($order, $reason = '') {
        $order -> update_status('on-hold', $reason);
    }

}

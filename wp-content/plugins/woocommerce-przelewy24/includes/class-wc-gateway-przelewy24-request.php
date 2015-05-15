<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Generates requests to send to Przelewy24
 */
class WC_Gateway_Przelewy24_Request {

    /**
     * Stores line items to send to Przelewy24
     * @var array
     */
    protected $line_items = array();

    /**
     * Pointer to gateway making the request
     * @var WC_Gateway_Przelewy24
     */
    protected $gateway;

    /**
     * Endpoint for requests from Przelewy24
     * @var string
     */
    protected $notify_url;

    /**
     * Constructor
     * @param WC_Gateway_Przelewy24 $gateway
     */
    public function __construct(WC_Gateway_Przelewy24 $gateway) {
        $this->gateway    = $gateway;
        $this->notify_url = WC()->api_request_url( 'WC_Gateway_Przelewy24' );
    }

    /**
     * Get the Przelewy24 request payload for an order
     * @param  WC_Order  $order
     * @return Array
     */
    public function get_request_payload($order) {
        $p24_id = $this->gateway->get_option('merchant_id');
        $amount = $order->get_total() * 100; // From float to int: 10.50 -> 1050
        $timestamp = time();
        $session_id = base64_encode(serialize(array($order->id, $order->order_key, $timestamp)));
        $p24_sign = md5($session_id.'|'.$p24_id.'|'.$amount.'|'.$order->get_order_currency().'|'.$this->gateway->get_option('crc_key'));

        $payload = array(
            'p24_merchant_id' => $p24_id,
            'p24_pos_id' => $p24_id,
            'p24_session_id' => $session_id,
            'p24_amount' => $amount,
            'p24_currency' => $order->get_order_currency(),
            'p24_country' => 'PL',
            'p24_language' => get_locale(),
            'p24_sign' => $p24_sign,
            'p24_encoding' => 'UTF-8',
            'p24_api_version' => '3.2',
            'p24_wait_for_result' => 1,
            'p24_description' => $order->id.' '.$order->billing_first_name.' '.$order->billing_last_name,
            'p24_phone' => $order->billing_phone,
            'p24_email' => $order->billing_email,
            'p24_address' => $order->billing_address_1." ".$order->billing_address_2,
            'p24_zip' => $order->billing_postcode,
            'p24_city' => $order->billing_city,
            'p24_url_cancel' => esc_url($order->get_cancel_order_url()),
            'p24_url_return' => esc_url($this->gateway->get_return_url($order)),
            'p24_url_status' => $this->notify_url,
            'p24_shipping' => $order->get_total_shipping() > 0 ? $order->get_total_shipping() * 100 : 0,
        );
        return array_merge($payload, $this->get_line_item_args($order));
    }

    /**
     * Get line item args for paypal request
     * @param  WC_Order $order
     * @return array
     */
    protected function get_line_item_args( $order ) {
        /**
         * Try passing a line item per product if supported
         */
        if ( ( ! wc_tax_enabled() || ! wc_prices_include_tax() ) && $this->prepare_line_items( $order ) ) {
            $line_item_args = $this->get_line_items();
        /**
         * Send order as a single item
         *
         * For shipping, we longer use shipping_1 because paypal ignores it if *any* shipping rules are within paypal, and paypal ignores anything over 5 digits (999.99 is the max)
         */
        } else {

            $this->delete_line_items();

            $this->add_line_item( $this->get_order_item_names( $order ), 1, number_format( $order->get_total() - round( $order->get_total_shipping() + $order->get_shipping_tax(), 2 ), 2, '.', '' ), $order->get_order_number() );
            $this->add_line_item( sprintf( __( 'Shipping via %s', 'woocommerce' ), ucwords( $order->get_shipping_method() ) ), 1, number_format( $order->get_total_shipping() + $order->get_shipping_tax(), 2, '.', '' ) );
            $line_item_args = $this->get_line_items();
        }

        return $line_item_args;
    }

    /**
     * Get order item names as a string
     * @param  WC_Order $order
     * @return string
     */
    protected function get_order_item_names( $order ) {
        $item_names = array();

        foreach ( $order->get_items() as $item ) {
            $item_names[] = $item['name'] . ' x ' . $item['qty'];
        }

        return implode( ', ', $item_names );
    }

    /**
     * Get order item names as a string
     * @param  WC_Order $order
     * @param  array $item
     * @return string
     */
    protected function get_order_item_name( $order, $item ) {
        $item_name = $item['name'];
        $item_meta = new WC_Order_Item_Meta( $item['item_meta'] );

        if ( $meta = $item_meta->display( true, true ) ) {
            $item_name .= ' ( ' . $meta . ' )';
        }

        return $item_name;
    }

    /**
     * Return all line items
     */
    protected function get_line_items() {
        return $this->line_items;
    }

    /**
     * Remove all line items
     */
    protected function delete_line_items() {
        $this->line_items = array();
    }

    /**
     * Get line items to send to paypal
     *
     * @param  WC_Order $order
     * @return bool
     */
    protected function prepare_line_items( $order ) {
        $this->delete_line_items();
        $calculated_total = 0;

        // Products
        foreach ( $order->get_items( array( 'line_item', 'fee' ) ) as $item ) {
            if ( 'fee' === $item['type'] ) {
                $line_item        = $this->add_line_item( $item['name'], 1, $item['line_total'] );
                $calculated_total += $item['line_total'];
            } else {
                $product          = $order->get_product_from_item( $item );
                $line_item        = $this->add_line_item( $this->get_order_item_name( $order, $item ), $item['qty'], $order->get_item_subtotal( $item, false ), $product->get_sku() );
                $calculated_total += $order->get_item_subtotal( $item, false ) * $item['qty'];
            }

            if ( ! $line_item ) {
                return false;
            }
        }

        // Shipping Cost item - paypal only allows shipping per item, we want to send shipping for the order
        if ( $order->get_total_shipping() > 0 && ! $this->add_line_item( sprintf( __( 'Shipping via %s', 'woocommerce' ), $order->get_shipping_method() ), 1, round( $order->get_total_shipping(), 2 ) ) ) {
            return false;
        }

        // Check for mismatched totals
        if ( wc_format_decimal( $calculated_total + $order->get_total_tax() + round( $order->get_total_shipping(), 2 ) - round( $order->get_total_discount(), 2 ), 2 ) != wc_format_decimal( $order->get_total(), 2 ) ) {
            return false;
        }

        return true;
    }

    /**
     * Add PayPal Line Item
     * @param string  $item_name
     * @param integer $quantity
     * @param integer $amount
     * @param string  $item_number
     * @return bool successfully added or not
     */
    protected function add_line_item( $item_name, $quantity = 1, $amount = 0, $item_number = '' ) {
        $index = ( sizeof( $this->line_items ) / 4 ) + 1;

        if ( ! $item_name || $amount < 0 || $index > 9 ) {
            return false;
        }

        $this->line_items[ 'p24_name_' . $index ]     = html_entity_decode( wc_trim_string( $item_name, 127 ), ENT_NOQUOTES, 'UTF-8' );
        $this->line_items[ 'p24_quantity_' . $index ] = $quantity;
        $this->line_items[ 'p24_price_' . $index ]    = $amount > 0 ? $amount * 100: 0;
        $this->line_items[ 'p24_number_' . $index ]   = $item_number;

        return true;
    }

}

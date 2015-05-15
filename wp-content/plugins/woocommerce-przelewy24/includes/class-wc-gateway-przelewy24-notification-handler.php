<?php

if (!defined('ABSPATH')) {
    exit ;
    // Exit if accessed directly
}

include_once ('class-wc-gateway-przelewy24-response.php');

/**
 * Handles responses from Przelewy24 IPN
 */
class WC_Gateway_Przelewy24_Notification_Handler extends WC_Gateway_Przelewy24_Response {

    /** @var WC_Gateway_Przelewy24 Payment service gateway */
    private $gateway;

    /**
     * Constructor
     */
    public function __construct(WC_Gateway_Przelewy24 $gateway) {
        add_action('woocommerce_api_wc_gateway_przelewy24', array($this, 'check_response'));
        $this->gateway = $gateway;
    }

    /**
     * Check for Przelewy24 IPN Response
     */
    public function check_response() {
        if (!empty($_POST)) {
            $posted = wp_unslash($_POST);
            if (!empty($posted['p24_session_id'])) {
                $custom = base64_decode($posted['p24_session_id']);
                if ($order = $this->get_przelewy24_order($custom)) {
                    WC_Gateway_Przelewy24::log('Found order #'.$order->id);
                    WC_Gateway_Przelewy24::log('Payment status: '.$posted['p24_statement']);
                    if (empty($posted['p24_error_code'])) {
                        $this->validate_sign($order, $posted);
                        $this->validate_currency($order, $posted['p24_currency']);
                        $this->validate_amount($order, $posted['p24_amount'] / 100);
                        $this->verify_transaction($order, $posted);
                    } else {
                        $this->report_failure(
                            $order,
                            sprintf(__('Validation error: Przelewy24 returned error code: %d', 'nps-przelewy24'), $posted['p24_error_code']),
                            array('Request: '.print_r($posted, true))
                        );
                    }
                } else {
                    $this->report_failure(
                        null,
                        sprintf(__('Validation error: Unable to find order by session ID %s', 'nps-przelewy24'), $posted['p24_session_id']),
                        array('Request: '.print_r($posted, true))
                    );
                }
            } else {
                $this->report_failure(
                    null,
                    __('Validation error: Missing sesion ID.', 'nps-przelewy24'),
                    array('Request: '.print_r($posted, true))
                );
            }
            exit;
        }

        wp_die("Przelewy24 IPN Request Failure", "Przelewy24 IPN", array('response' => 200));
    }

    /** Verify transaction by sending response to Przelewy24
    *
    * @param WC_Order $order
    * @param Array $posted
    * 
    */
    private function verify_transaction($order, $posted) {
        $payload = array(
            'p24_merchant_id' => $this->gateway->get_option('merchant_id'),
            'p24_pos_id' => $this->gateway->get_option('merchant_id'),
            'p24_session_id' => $posted['p24_session_id'],
            'p24_amount' => $posted['p24_amount'],
            'p24_currency' => $posted['p24_currency'],
            'p24_order_id' => $posted['p24_order_id'],
            'p24_sign' => $this->generate_sign($posted),
        );
        $result = $this->gateway->transaction_verify($payload);
        
        if (isset($result) && $result['error'] == 0) {
            $this->payment_complete($order, $posted['p24_order_id'], __('Payment complete', 'nps-przelewy24'));
        } else {
            $this->report_failure(
                $order,
                sprintf(__('Validation error: Unable to verify transaction. %s', 'nps-przelewy24'), $result['errorMessage'])
            );
        }
    }

    /** Reports payment error to system and administrator
    *
    * @param  WC_Order $order
    * @param string $message
    * @param Array $admin_info (oprional array of informations for administrator)  
    * 
    */
    private function report_failure($order, $message, $admin_info = array()) {
        $this->gateway->report_error(array_merge(array($message), $admin_info));
        if ($order != null) {
            $this->payment_on_hold($order, $message);
        }
   }

    /** Generates sign for Przelewy24 requests
    *
    * @param  Array $posted
    */
    private function generate_sign($posted) {
        return md5($posted['p24_session_id'].'|'.$posted['p24_order_id'].'|'.$posted['p24_amount'].'|'.$posted['p24_currency'].'|'.$this->gateway->get_option('crc_key'));
    }

    /**
     * Check Przelewy24 sign from IPN matches the generated one
     * 
     * @param  WC_Order $order
     * @param  Array $posted
     */
    private function validate_sign($order, $posted) {
        if ($this->generate_sign($posted) != $posted['p24_sign']) {
            $this->report_failure(
                $order,
                sprintf(__('Validation error: Przelewy24 sign do not match (code %s).', 'nps-przelewy24'), $posted['p24_sign'])
            );
            exit ;
        }
    }

    /**
     * Check currency from IPN matches the order
     * @param  WC_Order $order
     * @param  string $currency
     */
    private function validate_currency($order, $currency) {
        if ($order->get_order_currency() != $currency) {
            $this->report_failure(
                $order,
                sprintf(__('Validation error: Przelewy24 currencies do not match (code %s).', 'nps-przelewy24'), $currency)
            );
            exit ;
        }
    }

    /**
     * Check payment amount from IPN matches the order
     * @param  WC_Order $order
     * @param  float $amount
     */
    private function validate_amount($order, $amount) {
        if (number_format($order->get_total(), 2, '.', '') != number_format($amount, 2, '.', '')) {
            $this->report_failure(
                $order,
                sprintf(__('Validation error: Przelewy24 amounts do not match (gross %s).', 'nps-przelewy24'), $amount)
            );
            exit ;
        }
    }

}

<?php
/*
 * Przelewy 24 payment WooCommerce Gateway
 * 
 * @class       WC_Payment_Gateway
 * @extends     WC_Payment_Gateway
 * @version     1.0.0
 * @author:     Norbert Pabian
*/
class WC_Gateway_Przelewy24 extends WC_Payment_Gateway {

    /**
     * Constructor for the gateway.
     */
    function __construct() {
        $this->id = "nps_przelewy24";
        $this->method_title = __( "Przelewy 24", 'nps-przelewy24' );
        $this->method_description = __( "Przelewy 24 Payment Gateway Plug-in for WooCommerce", 'nps-przelewy24' );
        $this->title = __( "Przelewy 24", 'nps-przelewy24' );
        $this->icon = null;
        $this->has_fields = true;
        $this->supports = array( 'products' );
        $this->init_form_fields();
        $this->init_settings();
        foreach ( $this->settings as $setting_key => $value ) {
            $this->$setting_key = $value;
        }
        add_action( 'admin_notices', array( $this,  'do_ssl_check' ) );

        if ( is_admin() ) {
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
        }

        if (!$this->is_valid_for_use()) {
            $this->enabled = 'no';
        } else {
            include_once( 'class-wc-gateway-przelewy24-notification-handler.php' );
            new WC_Gateway_Przelewy24_Notification_Handler($this);
        }
    } // End __construct()

    /**
     * Logging method
     * @param  string $message
     */
    public static function log( $message ) {
        $log = new WC_Logger();
        $log->add( 'przelewy24', $message );
    }

    /**
     * Initialise Gateway Settings Form Fields
     */
    function init_form_fields() {
        $this->form_fields = array(
            'enabled' => array(
                'title'     => __( 'Enable / Disable', 'nps-przelewy24' ),
                'label'     => __( 'Enable this payment gateway', 'nps-przelewy24' ),
                'type'      => 'checkbox',
                'default'   => 'no',
            ),
            'title' => array(
                'title'     => __( 'Title', 'nps-przelewy24' ),
                'type'      => 'text',
                'desc_tip'  => __( 'Payment title the customer will see during the checkout process.', 'nps-przelewy24' ),
                'default'   => __( 'Przelewy24', 'nps-przelewy24' ),
            ),
            'description' => array(
                'title'     => __( 'Description', 'nps-przelewy24' ),
                'type'      => 'textarea',
                'desc_tip'  => __( 'Payment description the customer will see during the checkout process.', 'nps-przelewy24' ),
                'default'   => __( 'Pay securely using Przelewy24.', 'nps-przelewy24' ),
                'css'       => 'max-width:350px;'
            ),
            'merchant_id' => array(
                'title'     => __( 'Merchant ID', 'nps-przelewy24' ),
                'type'      => 'text',
                'desc_tip'  => __( 'This is the merchant ID provided by Przelewy24 when you signed up for an account.', 'nps-przelewy24' ),
            ),
            'crc_key' => array(
                'title'     => __( 'CRC Key', 'nps-przelewy24' ),
                'type'      => 'password',
                'desc_tip'  => __( 'This is the CRC Key provided by Przelewy24 when you signed up for an account.', 'nps-przelewy24' ),
            ),
            'service_email' => array(
                'title'     => __( 'Payment service admin email', 'nps-przelewy24' ),
                'type'      => 'text',
                'desc_tip'  => __( 'Email address to payment service administrator. All errors will be reported to this email.', 'nps-przelewy24' ),
                'default'   => __( 'admin@example.com', 'nps-przelewy24' ),
            ),
            'sandbox' => array(
                'title'     => __( 'Test Mode', 'nps-przelewy24' ),
                'label'     => __( 'Enable Test Mode', 'nps-przelewy24' ),
                'type'      => 'checkbox',
                'description' => __( 'Place the payment gateway in test mode.', 'nps-przelewy24' ),
                'default'   => 'no',
            ),
            'test_error' => array(
                'title'     => __( 'Test error code', 'nps-przelewy24' ),
                'type'      => 'text',
                'desc_tip'  => __( 'Special przelewy24 error code which allows to test error response.', 'nps-przelewy24' ),
                'default'   => __( '', 'nps-przelewy24' ),
            ),
        );
    }

    function process_payment( $order_id ) {
        include_once( 'class-wc-gateway-przelewy24-request.php' );
        global $woocommerce;
        $order = wc_get_order($order_id);
        $order->update_status('on-hold', __( 'Awaiting Przelewy24 payment', 'nps-przelewy24' ));
        $order->reduce_order_stock();
        $woocommerce->cart->empty_cart();
        $przelewy24_request = new WC_Gateway_Przelewy24_Request($this);
        $payload = $przelewy24_request->get_request_payload($order);
        $result = $this->transaction_register($payload);

        if (isset($result) && $result['error'] == 0) {
            $order->add_order_note(__( 'Przelewy24 payment registered. Awaiting for payment', 'nps-przelewy24' ));
            return array(
                'result'   => 'success',
                'redirect' => $this->gateway_url().'/trnRequest/'.$result['token']
           );
        } else {
            $order->add_order_note('Error: '.$result['errorMessage']);
            wc_add_notice($result['errorMessage'], 'error');
            return;
        }
    }

    /**
     * Get the return url (thank you page)
     *
     * @param WC_Order $order
     * @return string
     */
    public function get_return_url($order = null) {
        if ( $order ) {
            $return_url = $order->get_checkout_order_received_url();
        } else {
            $return_url = wc_get_endpoint_url('order-received', '', wc_get_page_permalink( 'checkout' ));
        }

        if ( is_ssl() || get_option('woocommerce_force_ssl_checkout') == 'yes' ) {
            $return_url = str_replace( 'http:', 'https:', $return_url );
        }
        return apply_filters( 'woocommerce_get_return_url', $return_url );
    }

    public function transaction_register($payload) {
        self::log('Registering Przelewy24 payment:'.implode(' | ', $payload));
        if ($this->get_option('sandbox') == 'yes') {
            $test_error = $this->get_option('test_error');
            if (isset($test_error) && !empty($test_error)) {
                $payload['p24_description'] = $test_error;
            }
        }
        return $this->call_service('/trnRegister', $payload);
    }

    public function transaction_verify($payload) {
        self::log('Verifying Przelewy24 transaction:'.implode(' | ', $payload));
        return $this->call_service('/trnVerify', $payload);
    }

    private function call_service($method, $payload) {
        $response = wp_remote_post($this->gateway_url().$method, array(
            'method'    => 'POST',
            'body'      => http_build_query($payload),
            'timeout'   => 90,
            'sslverify' => false,
        ));
        if (is_wp_error($response))
            return array(
                "error" => 203,
                "errorMessage" => __( 'We are currently experiencing problems trying to connect to this payment gateway. Sorry for the inconvenience.', 'nps-przelewy24' )
            );
 
        if ( empty( $response['body'] ) )
            return array(
                "error" => 204,
                "errorMessage" => __( 'Przelewy24 Response was empty. Sorry for the inconvenience.', 'nps-przelewy24' )
            );

        parse_str(wp_remote_retrieve_body($response), $result);
        if ($result['error'] != 0) {
            self::report_error(array(
                'Requested URL: '.$url,
                'Request params: '.implode(' | ', $data),
                'Response: '.implode(' | ', $result)
            ));
        }
        return $result;
    }

    public function gateway_url() {
        $url = 'https://secure.przelewy24.pl';
        if ($this->get_option('sandbox') == 'yes') {
            $url = 'https://sandbox.przelewy24.pl';
        }
        return $url;
    }

    /**
     * Check if this gateway is enabled and available in the user's country
     *
     * @return bool
     */
    public function is_valid_for_use() {
        return in_array( get_woocommerce_currency(), apply_filters( 'woocommerce_paypal_supported_currencies', array( 'AUD', 'BRL', 'CAD', 'MXN', 'NZD', 'HKD', 'SGD', 'USD', 'EUR', 'JPY', 'TRY', 'NOK', 'CZK', 'DKK', 'HUF', 'ILS', 'MYR', 'PHP', 'PLN', 'SEK', 'CHF', 'TWD', 'THB', 'GBP', 'RMB', 'RUB' ) ) );
    }

    public static function report_error($data) {
        self::log($data[0]);
        $mailer = WC()->mailer();
        $subject = _('Error reporting from Przelewy24 gateway.', 'nps-przelewy24');
        $message = $mailer->wrap_message($subject, implode('<br />', $data));

        $mailer->send($this->get_option('service_email'), $subject, $message);
    }

    public function do_ssl_check() {
        if( $this->enabled == "yes" ) {
            if( get_option( 'woocommerce_force_ssl_checkout' ) == "no" ) {
                echo "<div class=\"error\"><p>". sprintf( __( "<strong>%s</strong> is enabled and WooCommerce is not forcing the SSL certificate on your checkout page. Please ensure that you have a valid SSL certificate and that you are <a href=\"%s\">forcing the checkout pages to be secured.</a>" ), $this->method_title, admin_url( 'admin.php?page=wc-settings&tab=checkout' ) ) ."</p></div>";
            }
        }
    }
}
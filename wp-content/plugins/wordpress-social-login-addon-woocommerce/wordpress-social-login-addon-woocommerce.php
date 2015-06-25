<?php
/**
Plugin Name: Wordpress Social Login Addon Woocommerce
Plugin URI: https://github.com/lemoslincoln/wordpress-social-login-addon-woocommerce
Description: Adds some functions to better advantage of the Woocommerce and Wordpress Social Login.
Author: Lincoln Lemos
Author URI: http://bigodesign.com.br
Version: 0.1
License: GPLv2 or later
Text Domain: wordpress-social-login-addon-woocommerce
Domain Path: /languages/
*/

/**
 * WooCommerce and Wordpres Social Login fallback notice.
 */
function wslwoo_woocommerce_fallback_notice() {
	echo '<div class="error"><p>' . sprintf( __( 'Wordpress Social Login Addon Woocommerce depends on the last version of %s to work!', 'wordpress-social-login-addon-woocommerce' ), '<a href="http://wordpress.org/extend/plugins/woocommerce/">WooCommerce</a>' ) . '</p></div>';
}

function wslwoo_wsl_fallback_notice() {
	echo '<div class="error"><p>' . sprintf( __( 'Wordpress Social Login Addon Woocommerce depends on the last version of %s to work!', 'wordpress-social-login-addon-woocommerce' ), '<a href="http://wordpress.org/plugins/wordpress-social-login/">Wordpress Social Login</a>' ) . '</p></div>';
}


/**
 * Load functions.
 */
function wslwoo_load() {

	// Checks if WooCommerce is installed.
	if ( ! class_exists( 'Woocommerce' ) ) {
		add_action( 'admin_notices', 'wslwoo_woocommerce_fallback_notice' );

		return;
	}

	// Checks if Wordpress Social Login is installed.
	if ( ! function_exists('wsl_activate') ) {
		add_action( 'admin_notices', 'wslwoo_wsl_fallback_notice' );

	  return;
	}


	/**
	 * Load textdomain.
	 */
	// load_plugin_textdomain( 'wordpress-social-login-addon-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );



	// Get the Facebook profile data and use on woocommerce fields
	function check_wsl_wc_addon_facebook($user_id, $provider, $hybridauth_user_profile) {
		$locale = get_locale();
	  $birthday = implode('/', array($hybridauth_user_profile->birthDay,$hybridauth_user_profile->birthMonth, $hybridauth_user_profile->birthYear ));
	  $gender = $hybridauth_user_profile->gender;

	  // If is pt_BR, will translate the strings
	  if ($locale == 'pt_BR') {
  		  if ($gender == 'male') { $gender = 'Masculino'; }
  		    elseif ($gender == 'female') { $gender='Feminino'; }
  		      else { $gender = ''; }
	  }
	  
	  update_user_meta ( $user_id, 'billing_first_name'   , $hybridauth_user_profile->firstName );
	  update_user_meta ( $user_id, 'billing_last_name' , $hybridauth_user_profile->lastName );
	  update_user_meta ( $user_id, 'billing_birthdate' , $birthday );
	  update_user_meta ( $user_id, 'billing_sex' , $gender );
	}

	add_action( 'wsl_hook_process_login_before_redirect', 'check_wsl_wc_addon_facebook', 10, 3 );
	
}

add_action( 'plugins_loaded', 'wslwoo_load', 0 );
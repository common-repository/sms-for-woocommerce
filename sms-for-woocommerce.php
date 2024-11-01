<?php
/**
 * Plugin Name: SMS for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/sms-for-woocommerce/
 * Description: A powerful SMS Messaging/Texting plugin for WordPress/WooCommerce - This plugin is a fork from https://wordpress.org/plugins/wp-sms/ by VeronaLabs
 * Version: 1.0.14
 * Author: SMS.to
 * Author URI: https://sms.to
 * Text Domain: sfw-sms-for-woocommerce
 * Domain Path: /languages
 * WC requires at least: 3.0
 * WC tested up to: 8.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
 * Load Plugin Defines
 */
require_once 'includes/defines.php';

/**
 * Load plugin Special Functions
 */
require_once SFW_SMS_TO_WOO_DIR . 'includes/functions.php';

    /**
     * Get plugin options
     */
    $wpsmstowoo_option = get_option('wpsmstowoo_settings');    

    /**
     * Initial gateway
     */
    require_once SFW_SMS_TO_WOO_DIR . 'includes/class-smsforwoocommerce-gateway.php';

    $wpsmstowoo = sfc_sms_to_woo_initial_gateway();    

    /**
     * Load Plugin
     */
    require SFW_SMS_TO_WOO_DIR . 'includes/class-smsforwoocommerce.php';

    new SFW_SMS_TO_WOO();

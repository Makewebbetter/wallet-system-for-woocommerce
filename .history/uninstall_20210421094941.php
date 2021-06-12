<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Wallet_System_For_Woocommerce
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

//Delete cutom table after deactivation of the plugin.
 */
global $wpdb;
$wpdb->query( 'DROP TABLE IF EXISTS wp_mwb_wcb_wallet_transactions' );
$get_product_id = get_option( 'mwb_wcb_product_id', '' );
wp_delete_post( $get_product_id, true );
delete_option( 'mwb_wcb_product_id' );
delete_option( 'mwb_wcb_general' );
delete_option( 'mwb_wcb_topup_product' );
wp_cache_delete( 'wp_mwb_wcb_wallet_transactions' );
<?php
/**
 * Fired during plugin activation
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Wallet_System_For_Woocommerce
 * @subpackage Wallet_System_For_Woocommerce/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Wallet_System_For_Woocommerce_Api_Process' ) ) {

	/**
	 * The plugin API class.
	 *
	 * This is used to define the functions and data manipulation for custom endpoints.
	 *
	 * @since      1.0.0
	 * @package    Hydroshop_Api_Management
	 * @subpackage Hydroshop_Api_Management/includes
	 * @author     MakeWebBetter <makewebbetter.com>
	 */
	class Wallet_System_For_Woocommerce_Api_Process {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

		}

		/**
		 * Define the function to process data for custom endpoint.
		 *
		 * @since    1.0.0
		 * @param   Array $wsfw_request  data of requesting headers and other information.
		 * @return  Array $mwb_wsfw_rest_response    returns processed data and status of operations.
		 */
		public function mwb_wsfw_default_process( $wsfw_request ) {
			$mwb_wsfw_rest_response = array();

			// Write your custom code here.

			$mwb_wsfw_rest_response['status'] = 200;
			//$mwb_wsfw_rest_response['data'] = $wsfw_request->get_headers();
			$mwb_wsfw_rest_response['data'] = 'hello';
			return $mwb_wsfw_rest_response;
		}

		/**
		 * REturn user's wallet balance
		 *
		 * @param int $user_id
		 * @return array
		 */
		public function get_wallet_balance( $user_id ) {
			$mwb_wsfw_rest_response = array();

			if ( ! empty( $user_id ) ) {
				$user = get_user_by( 'id', $user_id );
				if ( $user ) {
					$wallet_bal = get_user_meta( $user_id, 'mwb_wallet', true );
					$mwb_wsfw_rest_response['data'] = $wallet_bal;
				} else {
					$mwb_wsfw_rest_response['data'] = esc_html__( 'User does not exist', 'wallet-system-for-woocommerce' );
				}
            }
			$mwb_wsfw_rest_response['status'] = 200;
		
			return $mwb_wsfw_rest_response;
		}

		/**
		 * REturn user's wallet balance
		 *
		 * @param int $user_id
		 * @return array
		 */
		public function get_user_wallet_transactions( $user_id ) {
			$mwb_wsfw_rest_response = array();

			if ( ! empty( $user_id ) ) {
				$user = get_user_by( 'id', $user_id );
				if ( $user ) {
					global $wpdb;
					$table_name = $wpdb->prefix . 'mwb_wsfw_wallet_transaction';
					$transactions = $wpdb->get_results( "SELECT * FROM $table_name WHERE user_id = $user_id ORDER BY Id" );
					if ( ! empty( $transactions ) && is_array($transactions ) ) {
						$mwb_wsfw_rest_response['data'] = $transactions;
					}
				} else {
					if ( empty( $posts ) ) {
						return new WP_Error( 'no_author', 'Invalid author', array( 'status' => 404 ) );
					  }
					$mwb_wsfw_rest_response['data'] = esc_html__( 'User does not exist', 'wallet-system-for-woocommerce' );
				}
            }
			$mwb_wsfw_rest_response['status'] = 200;
		
			return $mwb_wsfw_rest_response;
		}

	}
}
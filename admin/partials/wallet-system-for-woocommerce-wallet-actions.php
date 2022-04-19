<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html field for general tab.
 *
 * @link       https://wpswings.com/
 * @since      1.0.0
 *
 * @package    Wallet_System_For_Woocommerce
 * @subpackage Wallet_System_For_Woocommerce/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wsfw_wps_wsfw_obj;
$wsfw_wallet_action_registration_settings = apply_filters( 'wsfw_wallet_action_settings_registration_array', array() );

$wsfw_wallet_action_daily_visit_settings = apply_filters( 'wsfw_wallet_action_settings_daily_visit_array', array() );

$wsfw_wallet_action_comment_settings = apply_filters( 'wsfw_wallet_action_settings_comment_array', array() );


if ( isset( $_POST['wsfw_button_wallet_action'] ) ) {
	$nonce = ( isset( $_POST['updatenoncewallet_action'] ) ) ? sanitize_text_field( wp_unslash( $_POST['updatenoncewallet_action'] ) ) : '';
	if ( wp_verify_nonce( $nonce ) ) {
		$wsfw_plugin_admin = new Wallet_System_For_Woocommerce_Admin( $this->wsfw_get_plugin_name(), $this->wsfw_get_version() );

    $wsfw_plugin_admin->wsfw_admis_save_tab_settings_for_wallet_action();
  
	} else {
		$wsfw_wps_wsfw_obj->wps_wsfw_plug_admin_notice( esc_html__( 'Failed security check', 'wallet-system-for-woocommerce' ), 'error' );
	}
}
?>
<!--  template file for admin settings. -->
<form action="" method="POST" class="wps-wsfw-gen-section-form">
	<div class="wsfw-secion-wrap">
    <div class="wsfw-secion-registration">
      <span><b> <?php esc_html_e( 'Credit On New Registration', 'wallet-system-for-woocommerce' ); ?></b></span>
    <?php

      $wsfw_wallet_action_html = $wsfw_wps_wsfw_obj->wps_wsfw_plug_generate_html( $wsfw_wallet_action_registration_settings );
      echo esc_html( $wsfw_wallet_action_html );
    ?>
    </div>
    <div class="wsfw-secion-daily-visit">
    <span><b><?php esc_html_e( 'Credit On Daily Visit', 'wallet-system-for-woocommerce' ); ?></b></span>
    <?php

      $wsfw_wallet_action_html = $wsfw_wps_wsfw_obj->wps_wsfw_plug_generate_html( $wsfw_wallet_action_daily_visit_settings );
      echo esc_html( $wsfw_wallet_action_html );
    ?>
    </div>
    <div class="wsfw-secion-daily-visit">
    <span><b><?php esc_html_e( 'Credit On Comment', 'wallet-system-for-woocommerce' ); ?></b></span>
    <?php

      $wsfw_wallet_action_html = $wsfw_wps_wsfw_obj->wps_wsfw_plug_generate_html( $wsfw_wallet_action_comment_settings );
      echo esc_html( $wsfw_wallet_action_html );
    ?>
    </div>
    
		
		<input type="hidden" id="updatenoncewallet_action" name="updatenoncewallet_action" value="<?php echo esc_attr( wp_create_nonce() ); ?>" />
	</div>
</form>


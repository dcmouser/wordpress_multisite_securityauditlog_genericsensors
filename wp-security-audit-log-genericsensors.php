<?php
/*
  Plugin Name: WP Security Audit Log - Generic Sensors
  Plugin URI: https://www.donationcoder.com
  Description: an addon to the WP Security Audit Log Plugin to track generic simple string events
  Version: 1.0
  Author: mouser@donationcoder.com based on code by Bill Stoltz
  Author URI:
  Depends: WP Security Audit Log
  License: GPL3
  */

//define('WSALPMPRO_VERSION', '1.1.4');
//define('PMPRO_PLUGIN_NAME', 'paid-memberships-pro/paid-memberships-pro.php');


define('WSAL_Sensors_GenericSensorHooks_AlertCode_Notice', 104445);
define('WSAL_Sensors_GenericSensorHooks_AlertCode_Warning', 104446);
define('WSAL_Sensors_GenericSensorHooks_AlertCode_Critical', 104447); 


define('WSAL_PLUGIN_NAME', 'wp-security-audit-log/wp-security-audit-log.php');

register_activation_hook( __FILE__, 'wsal_generic_plugin_activation' );


function wsal_generic_plugin_activation() {
	$dir = plugin_dir_path(__DIR__);

	$min_wsal_version  = '2.6.2';
	$wsal_plugin_dir   = $dir . WSAL_PLUGIN_NAME ;

//	$min_pmpro_version = '1.8.13';
//	$pmpro_plugin_dir  = $dir . PMPRO_PLUGIN_NAME;

	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}


	if (is_plugin_active(WSAL_PLUGIN_NAME)) {
		$wsalData = get_plugin_data( $wsal_plugin_dir, false, true );
		if ( isset( $wsalData['Version'] ) && ( version_compare( $wsalData['Version'], $min_wsal_version, '<' ) ) ) {
			deactivate_plugins( basename( __FILE__ ) );
			wp_die(
				'<p>' .
				sprintf(
					'This plugin can not be activated because it requires at least version %s of WP Security Audit Log. Please upgrade WP Security Audit Log and then re-activate this plugin.',
					$min_wsal_version
				)
				. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . 'go back' . '</a>'
			);
		}
	} else {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die(
			'<p>' .
			sprintf(
				'This plugin can not be activated because WP Security Audit Log is not active. Please activate WP Security Audit Log and then re-activate this plugin.',
				$min_wsal_version
			)
			. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . 'go back' . '</a>'
		);
	}
}



function wsalgeneric_wsal_init ($wsal) {

		include_once 'wsal-generic-alerts.php';

		/** @var array $pmpro_alerts  // defined in pmpro-alerts.php */
		$wsal->alerts->RegisterGroup( $wsal_generic_alerts );

		$sensorDir     = trailingslashit( dirname( __FILE__ ) );
		$sensorDirPath = $sensorDir . 'Sensors' . DIRECTORY_SEPARATOR;

		if ( is_dir( $sensorDirPath ) && is_readable( $sensorDirPath ) ) {
			foreach ( glob( $sensorDirPath . '*.php' ) as $file ) {
				require_once( $file );
				$file  = substr( $file, 0, - 4 );
				$class = "WSAL_Sensors_" . str_replace( $sensorDirPath, '', $file );
				$wsal->sensors->AddFromClass( $class );
			}
		}
}


add_action('wsal_init', 'wsalgeneric_wsal_init');


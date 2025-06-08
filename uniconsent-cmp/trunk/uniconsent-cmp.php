<?php
/**
* Plugin Name: UniConsent Cookie Consent CMP
* Plugin URI: https://www.uniconsent.com/?utm_source=wp-plugins
* Description: Leading Consent Management Platform for IAB TCF, GPP, GDPR, POPIA, CCPA, COPPA, and LGPD Compliance.
* Version: 1.5.10
* Author: UniConsent
* Author URI: https://www.uniconsent.com/?utm_source=wp-plugins
* License: GPLv3
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'UNIC_CMP_VERSION', '1.5.10' );

function activate_unic_cmp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unic-activator.php';
	UNIC_Activator::activate();
}

function deactivate_unic_cmp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unic-deactivator.php';
	UNIC_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_unic_cmp' );
register_deactivation_hook( __FILE__, 'deactivate_unic_cmp' );

require plugin_dir_path( __FILE__ ) . 'includes/class-unic-cmp.php';

function run_unic_cmp() {

	$plugin = new UNIC_CMP();
	$plugin->run();

}
run_unic_cmp();

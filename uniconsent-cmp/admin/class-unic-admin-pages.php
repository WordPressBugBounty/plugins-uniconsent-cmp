<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2025 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

// Include the separated files
require_once plugin_dir_path( __FILE__ ) . 'views.php';
require_once plugin_dir_path( __FILE__ ) . 'settings.php';

class UNIC_Admin_Pages {

	private $settings;

	public function __construct() {
		// Load CSS styles
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		
		// Initialize settings
		$this->settings = new UNIC_Admin_Settings();
	}

	public function enqueue_admin_styles($hook) {
		if ($hook !== 'toplevel_page_unic-options') {
			return;
		}

		wp_enqueue_style( 
			'unic-admin-style', 
			plugin_dir_url( __FILE__ ) . 'style.css',
			array(),
			'1.0.0'
		);
		
		wp_enqueue_script(
			'unic-admin-script',
			plugin_dir_url( __FILE__ ) . 'views.js',
			array('jquery'),
			'1.0.0',
			true
		);
	}
}

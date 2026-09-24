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
			UNIC_CMP_VERSION
		);
		
		wp_enqueue_script(
			'unic-admin-script',
			plugin_dir_url( __FILE__ ) . 'views.js',
			array('jquery'),
			UNIC_CMP_VERSION,
			true
		);
		wp_localize_script( 'unic-admin-script', 'unicAdmin', array(
			'saving'        => __( 'Saving...', 'uniconsent-cmp' ),
			'save'          => __( 'Save Changes', 'uniconsent-cmp' ),
			'savedTitle'    => __( 'Settings saved', 'uniconsent-cmp' ),
			'savedMessage'  => __( 'Your consent banner settings have been updated.', 'uniconsent-cmp' ),
			'failedTitle'   => __( 'Save failed', 'uniconsent-cmp' ),
			'failedMessage' => __( 'Could not save settings. Please try again.', 'uniconsent-cmp' ),
			'networkError'  => __( 'Network error. Check your connection and try again.', 'uniconsent-cmp' ),
		) );
	}
}

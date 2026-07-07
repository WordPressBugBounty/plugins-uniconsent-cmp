<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2025 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

use UNIC\UNIC_Values;

class UNIC_Admin_Settings {

	private $unic_license;
	private $unic_options;
	private $unic_values;
	private $unic_language;
	private $unic_company;
	private $unic_logo;
	private $unic_policy_url;
	private $unic_language_default = 'en';

	public function __construct() {

		$this->unic_values = new UNIC_Values();
		$this->unic_language = esc_attr( get_option( 'unic_language' ) );

		$this->unic_language = isset( $this->unic_language ) && ! empty( $this->unic_language )
			? $this->unic_language
			: $this->unic_language_default;

		add_action( 'admin_init', array( $this, 'unic_options_page_init' ) );
		add_action( 'admin_menu', array( $this, 'add_unic_admin_pages' ) );
		add_action( 'admin_notices', array( $this, 'unic_admin_notice_license' ) );
		
		// Add AJAX handlers
		add_action( 'wp_ajax_save_uniconsent_settings', array( $this, 'save_uniconsent_settings' ) );

	}

	public function unic_admin_notice_license() {
	}

	public function unic_options() {
		$views = new UNIC_Admin_Views();
		$views->render_options_page();
	}
 
	public function add_unic_admin_pages() {

		$unic_admin_page = add_menu_page(
			'UniConsent CMP',
			'UniConsent CMP',
			'manage_options',
			'unic-options',
			array( $this, 'unic_options' )
		);

	}

	public function unic_options_page_init() {

		register_setting(
			'unic-general-config', // Option group
			'unic_license', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_language', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_barmode', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_show_badge', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_region', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_company', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_logo', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_policy_url', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_iab', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_gdpr', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_ccpa', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

	}

	public function sanitize_text( $input ) {
		$input = sanitize_text_field( $input );
		return $input;
	}

	public function sanitize_url( $input ) {
		$input = esc_url( $input );
		return $input;
	}

	public function save_uniconsent_settings()
	{
		// Verify WordPress nonce
		if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'unic-general-config-options')) {
			wp_send_json_error('Security check failed. Please refresh the page and try again.');
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error('Insufficient permissions');
		}

		// Allowed values for select fields
		$allowed_languages = array(
			'EN', 'FR', 'DE', 'ES', 'IT', 'PT', 'PL', 'NL', 'SV', 'BG', 'CA', 'CS',
			'DA', 'EL', 'ET', 'FI', 'HU', 'LT', 'LV', 'MT', 'NO', 'RO', 'RU', 'SK',
			'SL', 'ZH', 'SR', 'JA', 'BS', 'TR', 'CY', 'EU', 'GL', 'HE', 'ID', 'KO',
			'MK', 'MS', 'TL', 'UK', 'AR', 'SQ', 'HR', 'KA', 'HI', 'IS', 'TH', 'VI',
			'SW', 'ZH-HANT', 'PT-BR', 'SR-CYRL',
		);
		$allowed_regions = array( 'none', 'worldwide', 'eu' );
		$allowed_barmodes = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'popup' );
		$allowed_yes_no = array( 'yes', 'no' );
		$allowed_iab = array( 'no', 'v2' );

		// Validate and sanitize settings
		$language = isset($_POST['unic_language']) ? sanitize_text_field($_POST['unic_language']) : 'EN';
		$region = isset($_POST['unic_region']) ? sanitize_text_field($_POST['unic_region']) : 'none';
		$barmode = isset($_POST['unic_barmode']) ? sanitize_text_field($_POST['unic_barmode']) : '8';
		$show_badge = isset($_POST['unic_show_badge']) ? sanitize_text_field($_POST['unic_show_badge']) : 'yes';
		$enable_gdpr = isset($_POST['unic_enable_gdpr']) ? sanitize_text_field($_POST['unic_enable_gdpr']) : 'no';
		$enable_ccpa = isset($_POST['unic_enable_ccpa']) ? sanitize_text_field($_POST['unic_enable_ccpa']) : 'no';
		$enable_iab = isset($_POST['unic_enable_iab']) ? sanitize_text_field($_POST['unic_enable_iab']) : 'no';

		$settings = array(
			'unic_license' => isset($_POST['unic_license']) ? sanitize_text_field($_POST['unic_license']) : '',
			'unic_language' => in_array($language, $allowed_languages, true) ? $language : 'EN',
			'unic_company' => isset($_POST['unic_company']) ? sanitize_text_field($_POST['unic_company']) : '',
			'unic_logo' => isset($_POST['unic_logo']) ? esc_url_raw($_POST['unic_logo']) : '',
			'unic_policy_url' => isset($_POST['unic_policy_url']) ? esc_url_raw($_POST['unic_policy_url']) : '',
			'unic_region' => in_array($region, $allowed_regions, true) ? $region : 'none',
			'unic_barmode' => in_array($barmode, $allowed_barmodes, true) ? $barmode : '8',
			'unic_show_badge' => in_array($show_badge, $allowed_yes_no, true) ? $show_badge : 'yes',
			'unic_enable_gdpr' => in_array($enable_gdpr, $allowed_yes_no, true) ? $enable_gdpr : 'no',
			'unic_enable_ccpa' => in_array($enable_ccpa, $allowed_yes_no, true) ? $enable_ccpa : 'no',
			'unic_enable_iab' => in_array($enable_iab, $allowed_iab, true) ? $enable_iab : 'no',
		);

		$errors = [];
        foreach ($settings as $key => $value) {
            $old = get_option($key);
            $result = update_option($key, $value);
            if ($old !== $value && $result === false) {
                $errors[] = $key . ' failed to update';
            }
        }
        if (empty($errors)) {
            wp_send_json_success('Settings saved successfully');
        } else {
            wp_send_json_error('Failed to save: ' . implode(', ', $errors));
        }
	}
} 
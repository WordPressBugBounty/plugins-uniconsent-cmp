<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2025 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

use UNIC\UNIC_Values;

class UNIC_Public {

	private $plugin_name;

	private $version;

	private $unic_values;

	private $unic_default_language;

	private $unic_display_language;
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->unic_values = new UNIC_Values();

	}

	public function enqueue_styles() {

	}

	public function enqueue_scripts() {

		// sync tag at the top of <head>: cmp.js sets up the TCF/USP/GPP stubs and consent mode defaults, then loads the CMP
		$unic_license = UNIC_Values::parse_license(get_option( 'unic_license' ));
		if(!$unic_license) {
			$unic_license = '85d3bd683e';
			echo "<script data-nowprocket data-cfasync='false' data-no-optimize='1' data-no-defer='1' data-noptimize>\n";
			echo "window.__unic_config_v2 = ".$this->get_unic_init_values().";\n";
			echo "window.wp_consent_type = 'optin';\n";
			echo "</script>\n";
		}
		echo "<script data-nowprocket data-cfasync='false' data-no-optimize='1' data-no-defer='1' data-noptimize src='".esc_url('https://cmp.uniconsent.com/v2/cmp.js')."' data-license='".esc_attr($unic_license)."'></script>\n";

	}

	public function get_unic_init_values() {

		$unic_init_vals = array();

		$unic_license = UNIC_Values::parse_license(get_option( 'unic_license' ));
		if($unic_license) {
			$unic_init_vals['unic_license'] = $unic_license;
			$unic_init_vals['version'] = 2;
		} else {

			$unic_enable_iab = esc_attr(get_option( 'unic_enable_iab' ));
			if(!$unic_enable_iab) {
				$unic_enable_iab = 'no';
			}
			// simple mode: SDKs without unic_enable_ez support fall back to no IAB vendors
			if($unic_enable_iab == 'ez') {
				$unic_init_vals['unic_enable_ez'] = 'yes';
				$unic_enable_iab = 'no';
			}
			$unic_init_vals['unic_enable_iab'] = $unic_enable_iab;

			$unic_region = esc_attr(get_option( 'unic_region' ));
			if(!$unic_region) {
				$unic_region = 'worldwide';
			}
			$unic_init_vals['unic_region'] = $unic_region;

			$unic_language = esc_attr(get_option( 'unic_language' ));
			if(!$unic_language) {
				$unic_language = 'en';
			}
			// empty language lets the CMP follow the visitor's browser language
			if($unic_language == 'AUTO') {
				$unic_language = '';
			}
			if($unic_enable_iab == 'v2') {
				$unic_language = strtoupper($unic_language);
			} else {
				$unic_language = strtolower($unic_language);
			}
			$unic_init_vals['unic_language'] = $unic_language;

			$unic_company = esc_attr(get_option( 'unic_company' ));
			if(!$unic_company) {
				$unic_company = esc_attr(get_bloginfo( 'name' ));
			}
			$unic_init_vals['unic_company'] = $unic_company;

			$unic_logo = esc_url(get_option( 'unic_logo' ));
			if(!$unic_logo) {
				$unic_logo = '';
			}
			$unic_init_vals['unic_logo'] = $unic_logo;

			$unic_policy_url = esc_url(get_option( 'unic_policy_url' ));
			if(!$unic_policy_url) {
				$unic_policy_url = esc_url(get_privacy_policy_url());
			}
			$unic_init_vals['unic_policy_url'] = $unic_policy_url;

			$unic_barmode = esc_attr(get_option( 'unic_barmode' ));
			if(!$unic_barmode && $unic_barmode !== '0') {
				$unic_type = esc_attr(get_option( 'unic_type' ));
				if($unic_type === 'popup') {
					$unic_barmode = 'popup';
				} else if($unic_type === 'bar') {
					$unic_barmode = '0';
				} else {
					$unic_barmode = '8';
				}
			}
			if($unic_barmode === 'popup') {
				$unic_init_vals['unic_type'] = 'popup';
			} else {
				$unic_init_vals['unic_type'] = 'bar';
				$unic_init_vals['unic_barmode'] = $unic_barmode;
			}

			$unic_show_badge = esc_attr(get_option( 'unic_show_badge' ));
			if(!$unic_show_badge) {
				$unic_show_badge = 'yes';
			}
			$unic_init_vals['unic_show_badge'] = $unic_show_badge;

			$unic_publisher_country = strtoupper(esc_attr(get_option( 'unic_publisher_country' )));
			if(!preg_match('/^[A-Z]{2}$/', $unic_publisher_country)) {
				$unic_publisher_country = 'DE';
			}
			$unic_init_vals['publisherCountryCode'] = $unic_publisher_country;
		}
		
		return json_encode( $unic_init_vals );

	}
}

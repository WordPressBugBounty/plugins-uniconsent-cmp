<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2020 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

namespace UNIC;

class UNIC_Values {

	private $default_values;

	public function __construct() {

		$this->default_values = array(
			'unic_language'  => 'EN',
			'unic_region'	=> 'worldwide',
			'unic_enable_iab' => 'no',
			'unic_barmode' => '8',
			'unic_show_badge' => 'yes',
			'unic_enable_ccpa' => 'no',
			'unic_enable_gdpr' => 'yes',
			'publisherCountryCode' => 'DE',
		);

	}

	/**
	 * Returns the 10-char project ID from a license key, or '' if invalid.
	 * Accepts "license-xxxxxxxxxx", "key-xxxxxxxxxx" and the bare "xxxxxxxxxx" form.
	 */
	public static function parse_license( $raw ) {
		$value = strtolower( trim( (string) $raw ) );
		$value = preg_replace( '/^(license|key)-/', '', $value );
		$value = substr( preg_replace( '/[^a-z0-9]/', '', $value ), 0, 10 );
		return strlen( $value ) === 10 ? $value : '';
	}
}

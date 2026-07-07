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
}

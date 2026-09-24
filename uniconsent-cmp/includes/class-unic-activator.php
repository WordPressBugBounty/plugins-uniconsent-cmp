<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2022 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

class UNIC_Activator {

	public static function activate() {
		// new installs default to cookie categories mode and the visitor's language; add_option keeps any saved value
		add_option( 'unic_enable_iab', 'ez' );
		add_option( 'unic_language', 'AUTO' );
	}

}

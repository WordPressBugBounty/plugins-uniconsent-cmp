<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2025 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

class UNIC_Admin_Views {

	public function render_options_page() { ?>

		<div class="unis-wrap">
			<?php settings_errors(); ?>
			
			<!-- Header Banner -->
			<header class="unis-header">
				<div class="unis-header__container">
					<div class="unis-header__brand">
						<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'images/unic-logo.png' ); ?>" alt="UniConsent" class="unis-header__logo">
					</div>
				</div>
			</header>

			<!-- Navigation Tabs -->
			<nav class="unis-nav">
				<div class="unis-nav__container">
					<ul class="unis-nav__tabs">
						<li class="unis-nav__tab">
							<a href="#" class="unis-nav__link unis-nav__link--active" data-tab="settings"><?php _e( 'Settings', 'uniconsent-cmp' ); ?></a>
						</li>
						<li class="unis-nav__tab">
							<a href="#" class="unis-nav__link" data-tab="support"><?php _e( 'Support', 'uniconsent-cmp' ); ?></a>
						</li>
					</ul>
				</div>
			</nav>

			<!-- Main Content -->
			<main class="unis-main">
				<!-- Content Section -->
				<div class="unis-content">
					<!-- Settings Tab Content -->
					<div id="settings-content" class="unis-tab-content unis-tab-content--active">
						<section class="unis-section">
							<div class="unis-section__header">
								<h2 class="unis-section__title"><?php _e( 'UniConsent Configuration', 'uniconsent-cmp' ); ?></h2>
								<p class="unis-section__subtitle"><?php _e( 'Configure your UniConsent integration settings', 'uniconsent-cmp' ); ?></p>
							</div>

							<form method="post" action="options.php" id="uniconsent-settings-form">
								<?php settings_fields( 'unic-general-config' ); ?>
								
								<?php $unic_license = esc_attr(get_option( 'unic_license')); ?>
								<?php if(!($unic_license && (strpos($unic_license, 'key-') > -1 || strpos($unic_license, 'license-') > -1))): ?>

								<?php
								$unic_barmode = get_option( 'unic_barmode' );
								if(!$unic_barmode && $unic_barmode !== '0') {
									$unic_type = get_option( 'unic_type' );
									if($unic_type === 'popup') {
										$unic_barmode = 'popup';
									} else if($unic_type === 'bar') {
										$unic_barmode = '0';
									} else {
										$unic_barmode = '8';
									}
								}
								?>
								<div class="unis-form-group">
									<label class="unis-label"><?php _e( 'CMP Style', 'uniconsent-cmp' ); ?></label>
									<input type="hidden" id="unic_barmode" name="unic_barmode" value="<?php echo esc_attr($unic_barmode); ?>">
									<div class="unis-tmpl-grid">
										<?php
										$templates = array(
											array('value' => '0', 'label' => 'Normal', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="0" y="70" width="160" height="30" rx="0" fill="#4a90d9"/><rect x="8" y="76" width="60" height="6" rx="2" fill="#fff" opacity=".7"/><rect x="8" y="86" width="40" height="6" rx="2" fill="#fff" opacity=".5"/><rect x="110" y="78" width="40" height="12" rx="3" fill="#fff"/></svg>'),
											array('value' => '1', 'label' => 'Push Down', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="0" y="0" width="160" height="35" fill="#4a90d9"/><rect x="8" y="8" width="60" height="6" rx="2" fill="#fff" opacity=".7"/><rect x="8" y="18" width="40" height="6" rx="2" fill="#fff" opacity=".5"/><rect x="110" y="10" width="40" height="12" rx="3" fill="#fff"/><rect x="10" y="45" width="140" height="6" rx="2" fill="#ddd"/><rect x="10" y="57" width="100" height="6" rx="2" fill="#ddd"/></svg>'),
											array('value' => '2', 'label' => 'Simple', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="15" y="60" width="130" height="35" rx="4" fill="#4a90d9"/><rect x="22" y="67" width="50" height="5" rx="2" fill="#fff" opacity=".7"/><rect x="22" y="76" width="35" height="5" rx="2" fill="#fff" opacity=".5"/><rect x="90" y="72" width="45" height="14" rx="3" fill="#fff"/></svg>'),
											array('value' => '3', 'label' => 'Corner', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="5" y="50" width="70" height="45" rx="6" fill="#4a90d9"/><rect x="12" y="57" width="40" height="5" rx="2" fill="#fff" opacity=".7"/><rect x="12" y="66" width="30" height="5" rx="2" fill="#fff" opacity=".5"/><rect x="12" y="78" width="25" height="10" rx="3" fill="#fff"/><rect x="42" y="78" width="25" height="10" rx="3" fill="#fff" opacity=".6"/></svg>'),
											array('value' => '4', 'label' => 'Mini', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="5" y="62" width="55" height="33" rx="5" fill="#4a90d9"/><rect x="11" y="68" width="35" height="4" rx="2" fill="#fff" opacity=".7"/><rect x="11" y="76" width="20" height="8" rx="3" fill="#fff"/><rect x="35" y="76" width="20" height="8" rx="3" fill="#fff" opacity=".6"/></svg>'),
											array('value' => '5', 'label' => 'Floating Card', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="8" y="30" width="72" height="62" rx="10" fill="#4a90d9"/><circle cx="18" cy="42" r="5" fill="#fff" opacity=".6"/><rect x="26" y="39" width="40" height="6" rx="2" fill="#fff" opacity=".8"/><rect x="14" y="52" width="55" height="4" rx="2" fill="#fff" opacity=".5"/><rect x="14" y="60" width="45" height="4" rx="2" fill="#fff" opacity=".4"/><rect x="14" y="72" width="28" height="12" rx="4" fill="#fff"/><rect x="46" y="72" width="28" height="12" rx="4" fill="#fff" opacity=".6"/></svg>'),
											array('value' => '6', 'label' => 'Compact Inline', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="0" y="78" width="160" height="22" fill="#4a90d9"/><rect x="8" y="84" width="50" height="5" rx="2" fill="#fff" opacity=".7"/><rect x="100" y="82" width="24" height="10" rx="3" fill="#fff"/><rect x="128" y="82" width="24" height="10" rx="3" fill="#fff" opacity=".6"/><circle cx="93" cy="87" r="5" fill="#fff" opacity=".4"/></svg>'),
											array('value' => '7', 'label' => 'Clean Stacked', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0" opacity=".5"/><rect x="30" y="8" width="100" height="84" rx="8" fill="#4a90d9"/><rect x="42" y="18" width="50" height="6" rx="2" fill="#fff" opacity=".8"/><rect x="42" y="28" width="70" height="4" rx="2" fill="#fff" opacity=".4"/><rect x="42" y="36" width="60" height="4" rx="2" fill="#fff" opacity=".3"/><rect x="40" y="48" width="80" height="12" rx="4" fill="#fff"/><rect x="40" y="64" width="80" height="12" rx="4" fill="#fff" opacity=".6"/><rect x="40" y="80" width="80" height="8" rx="3" fill="#fff" opacity=".3"/></svg>'),
											array('value' => '8', 'label' => 'Bottom Sheet', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="0" y="45" width="160" height="55" fill="#fff"/><line x1="0" y1="45" x2="160" y2="45" stroke="#ddd" stroke-width="1"/><rect x="40" y="52" width="80" height="5" rx="2" fill="#333" opacity=".7"/><rect x="30" y="62" width="100" height="3" rx="1" fill="#999" opacity=".4"/><rect x="25" y="72" width="110" height="10" rx="3" fill="#4a90d9"/><rect x="25" y="85" width="110" height="10" rx="3" fill="#ddd"/></svg>'),
											array('value' => '9', 'label' => 'Dark Compact', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0"/><rect x="0" y="78" width="160" height="22" fill="#1a1a2e"/><rect x="8" y="84" width="70" height="4" rx="2" fill="#b0b0c0" opacity=".6"/><rect x="100" y="82" width="24" height="10" rx="10" fill="transparent" stroke="#666" stroke-width="1"/><rect x="128" y="82" width="28" height="10" rx="10" fill="#4a90d9"/></svg>'),
											array('value' => 'popup', 'label' => 'Popup', 'svg' => '<svg viewBox="0 0 160 100" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="100" rx="4" fill="#f0f0f0" opacity=".5"/><rect x="25" y="10" width="110" height="80" rx="8" fill="#4a90d9"/><rect x="40" y="22" width="60" height="6" rx="2" fill="#fff" opacity=".8"/><rect x="38" y="32" width="80" height="4" rx="2" fill="#fff" opacity=".4"/><rect x="38" y="40" width="70" height="4" rx="2" fill="#fff" opacity=".3"/><rect x="38" y="52" width="80" height="12" rx="4" fill="#fff"/><rect x="38" y="68" width="80" height="12" rx="4" fill="#fff" opacity=".6"/></svg>'),
										);
										foreach ($templates as $t) : ?>
											<div class="unis-tmpl-card <?php echo $unic_barmode === $t['value'] ? 'active' : ''; ?>" data-value="<?php echo esc_attr($t['value']); ?>" onclick="document.getElementById('unic_barmode').value=this.dataset.value;document.querySelectorAll('.unis-tmpl-card').forEach(function(c){c.classList.remove('active')});this.classList.add('active');">
												<div class="unis-tmpl-card__preview"><?php echo $t['svg']; ?></div>
												<div class="unis-tmpl-card__label"><?php _e($t['label'], 'uniconsent-cmp'); ?></div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>

								<?php $unic_language = get_option( 'unic_language' ); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_language"><?php _e( 'Language', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_language" name="unic_language">
										<option value="EN" <?php selected( $unic_language, 'EN' ); ?>><?php _e( 'English', 'uniconsent-cmp' ); ?></option>
										<option value="FR" <?php selected( $unic_language, 'FR' ); ?>><?php _e( 'French', 'uniconsent-cmp' ); ?></option>
										<option value="DE" <?php selected( $unic_language, 'DE' ); ?>><?php _e( 'German', 'uniconsent-cmp' ); ?></option>
										<option value="ES" <?php selected( $unic_language, 'ES' ); ?>><?php _e( 'Spanish', 'uniconsent-cmp' ); ?></option>
										<option value="IT" <?php selected( $unic_language, 'IT' ); ?>><?php _e( 'Italian', 'uniconsent-cmp' ); ?></option>
										<option value="PT" <?php selected( $unic_language, 'PT' ); ?>><?php _e( 'Portuguese', 'uniconsent-cmp' ); ?></option>
										<option value="PL" <?php selected( $unic_language, 'PL' ); ?>><?php _e( 'Polish', 'uniconsent-cmp' ); ?></option>
										<option value="NL" <?php selected( $unic_language, 'NL' ); ?>><?php _e( 'Dutch', 'uniconsent-cmp' ); ?></option>
										<option value="SV" <?php selected( $unic_language, 'SV' ); ?>><?php _e( 'Swedish', 'uniconsent-cmp' ); ?></option>
										<option value="BG" <?php selected( $unic_language, 'BG' ); ?>><?php _e( 'Bulgarian', 'uniconsent-cmp' ); ?></option>
										<option value="CA" <?php selected( $unic_language, 'CA' ); ?>><?php _e( 'Catalan', 'uniconsent-cmp' ); ?></option>
										<option value="CS" <?php selected( $unic_language, 'CS' ); ?>><?php _e( 'Czech', 'uniconsent-cmp' ); ?></option>
										<option value="DA" <?php selected( $unic_language, 'DA' ); ?>><?php _e( 'Danish', 'uniconsent-cmp' ); ?></option>
										<option value="EL" <?php selected( $unic_language, 'EL' ); ?>><?php _e( 'Greek', 'uniconsent-cmp' ); ?></option>
										<option value="ET" <?php selected( $unic_language, 'ET' ); ?>><?php _e( 'Estonian', 'uniconsent-cmp' ); ?></option>
										<option value="FI" <?php selected( $unic_language, 'FI' ); ?>><?php _e( 'Finnish', 'uniconsent-cmp' ); ?></option>
										<option value="HU" <?php selected( $unic_language, 'HU' ); ?>><?php _e( 'Hungarian', 'uniconsent-cmp' ); ?></option>
										<option value="LT" <?php selected( $unic_language, 'LT' ); ?>><?php _e( 'Lithuanian', 'uniconsent-cmp' ); ?></option>
										<option value="LV" <?php selected( $unic_language, 'LV' ); ?>><?php _e( 'Latvian', 'uniconsent-cmp' ); ?></option>
										<option value="MT" <?php selected( $unic_language, 'MT' ); ?>><?php _e( 'Maltese', 'uniconsent-cmp' ); ?></option>
										<option value="NO" <?php selected( $unic_language, 'NO' ); ?>><?php _e( 'Norwegian', 'uniconsent-cmp' ); ?></option>
										<option value="RO" <?php selected( $unic_language, 'RO' ); ?>><?php _e( 'Romanian', 'uniconsent-cmp' ); ?></option>
										<option value="RU" <?php selected( $unic_language, 'RU' ); ?>><?php _e( 'Russian', 'uniconsent-cmp' ); ?></option>
										<option value="SK" <?php selected( $unic_language, 'SK' ); ?>><?php _e( 'Slovak', 'uniconsent-cmp' ); ?></option>
										<option value="SL" <?php selected( $unic_language, 'SL' ); ?>><?php _e( 'Slovenian', 'uniconsent-cmp' ); ?></option>
										<option value="ZH" <?php selected( $unic_language, 'ZH' ); ?>><?php _e( 'Chinese', 'uniconsent-cmp' ); ?></option>
										<option value="SR" <?php selected( $unic_language, 'SR' ); ?>><?php _e( 'Serbian', 'uniconsent-cmp' ); ?></option>
										<option value="JA" <?php selected( $unic_language, 'JA' ); ?>><?php _e( 'Japanese', 'uniconsent-cmp' ); ?></option>
										<option value="BS" <?php selected( $unic_language, 'BS' ); ?>><?php _e( 'Bosnian', 'uniconsent-cmp' ); ?></option>
										<option value="TR" <?php selected( $unic_language, 'TR' ); ?>><?php _e( 'Turkish', 'uniconsent-cmp' ); ?></option>
										<option value="CY" <?php selected( $unic_language, 'CY' ); ?>><?php _e( 'Welsh', 'uniconsent-cmp' ); ?></option>
										<option value="EU" <?php selected( $unic_language, 'EU' ); ?>><?php _e( 'Basque', 'uniconsent-cmp' ); ?></option>
										<option value="GL" <?php selected( $unic_language, 'GL' ); ?>><?php _e( 'Galician', 'uniconsent-cmp' ); ?></option>
										<option value="HE" <?php selected( $unic_language, 'HE' ); ?>><?php _e( 'Hebrew', 'uniconsent-cmp' ); ?></option>
										<option value="ID" <?php selected( $unic_language, 'ID' ); ?>><?php _e( 'Indonesian', 'uniconsent-cmp' ); ?></option>
										<option value="KO" <?php selected( $unic_language, 'KO' ); ?>><?php _e( 'Korean', 'uniconsent-cmp' ); ?></option>
										<option value="MK" <?php selected( $unic_language, 'MK' ); ?>><?php _e( 'Macedonian', 'uniconsent-cmp' ); ?></option>
										<option value="MS" <?php selected( $unic_language, 'MS' ); ?>><?php _e( 'Malay', 'uniconsent-cmp' ); ?></option>
										<option value="TL" <?php selected( $unic_language, 'TL' ); ?>><?php _e( 'Tagalog', 'uniconsent-cmp' ); ?></option>
										<option value="UK" <?php selected( $unic_language, 'UK' ); ?>><?php _e( 'Ukrainian', 'uniconsent-cmp' ); ?></option>
										<option value="AR" <?php selected( $unic_language, 'AR' ); ?>><?php _e( 'Arabic', 'uniconsent-cmp' ); ?></option>
										<option value="SQ" <?php selected( $unic_language, 'SQ' ); ?>><?php _e( 'Albanian', 'uniconsent-cmp' ); ?></option>
										<option value="HR" <?php selected( $unic_language, 'HR' ); ?>><?php _e( 'Croatian', 'uniconsent-cmp' ); ?></option>
										<option value="KA" <?php selected( $unic_language, 'KA' ); ?>><?php _e( 'Georgian', 'uniconsent-cmp' ); ?></option>
										<option value="HI" <?php selected( $unic_language, 'HI' ); ?>><?php _e( 'Hindi', 'uniconsent-cmp' ); ?></option>
										<option value="IS" <?php selected( $unic_language, 'IS' ); ?>><?php _e( 'Icelandic', 'uniconsent-cmp' ); ?></option>
										<option value="TH" <?php selected( $unic_language, 'TH' ); ?>><?php _e( 'Thai', 'uniconsent-cmp' ); ?></option>
										<option value="VI" <?php selected( $unic_language, 'VI' ); ?>><?php _e( 'Vietnamese', 'uniconsent-cmp' ); ?></option>
										<option value="SW" <?php selected( $unic_language, 'SW' ); ?>><?php _e( 'Swahili', 'uniconsent-cmp' ); ?></option>
										<option value="ZH-HANT" <?php selected( $unic_language, 'ZH-HANT' ); ?>><?php _e( 'Chinese (Traditional)', 'uniconsent-cmp' ); ?></option>
										<option value="PT-BR" <?php selected( $unic_language, 'PT-BR' ); ?>><?php _e( 'Portuguese (Brazil)', 'uniconsent-cmp' ); ?></option>
										<option value="SR-CYRL" <?php selected( $unic_language, 'SR-CYRL' ); ?>><?php _e( 'Serbian (Cyrillic)', 'uniconsent-cmp' ); ?></option>
									</select>
								</div>

								<?php $unic_show_badge = get_option( 'unic_show_badge', 'yes' ); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_show_badge"><?php _e( 'Display Privacy Badge', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_show_badge" name="unic_show_badge">
										<option value="yes" <?php selected( $unic_show_badge, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent-cmp' ); ?></option>
										<option value="no" <?php selected( $unic_show_badge, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
									</select>
									<div class="unis-help-text">
										<?php _e( 'Display a privacy badge on your website so users can re-open the consent manager.', 'uniconsent-cmp' ); ?>
									</div>
								</div>

								<?php $unic_enable_gdpr = get_option( 'unic_enable_gdpr'); ?>
								<?php if(!$unic_enable_gdpr) {
									$unic_enable_gdpr = 'yes';
								} ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_enable_gdpr"><?php _e( 'Enable EU GDPR Compliance', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_enable_gdpr" name="unic_enable_gdpr">
										<option value="no" <?php selected( $unic_enable_gdpr, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
										<option value="yes" <?php selected( $unic_enable_gdpr, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent-cmp' ); ?></option>
									</select>
								</div>

								<?php $unic_region = get_option( 'unic_region' ); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_region"><?php _e( 'GDPR Policy Region', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_region" name="unic_region">
										<option value="none" <?php selected( $unic_region, 'none' ); ?>><?php _e( 'None', 'uniconsent-cmp' ); ?></option>
										<option value="worldwide" <?php selected( $unic_region, 'worldwide' ); ?>><?php _e( 'Worldwide', 'uniconsent-cmp' ); ?></option>
										<option value="eu" <?php selected( $unic_region, 'eu' ); ?>><?php _e( 'EU (EEA) Countries', 'uniconsent-cmp' ); ?></option>
									</select>
									<div class="unis-help-text">
										<?php _e( 'When select EU, only display CMP to the users in EU countries.', 'uniconsent-cmp' ); ?>
									</div>
								</div>

								<?php $unic_enable_iab = get_option( 'unic_enable_iab'); ?>
								<?php if(!$unic_enable_iab) {
									$unic_enable_iab = 'no';
								} ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_enable_iab"><?php _e( 'IAB TCF Compliance', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_enable_iab" name="unic_enable_iab">
										<option value="no" <?php selected( $unic_enable_iab, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
										<option value="v2" <?php selected( $unic_enable_iab, 'v2' ); ?>><?php _e( 'IAB TCF 2.3', 'uniconsent-cmp' ); ?></option>
									</select>
									<div class="unis-help-text">
										<?php _e( 'Required if you run Google AdSense, Google Ad Manager, or other Google ads: select IAB TCF 2.3 to serve ads to visitors in the EEA, UK, and Switzerland.', 'uniconsent-cmp' ); ?>
									</div>
								</div>

								<?php $unic_enable_ccpa = get_option( 'unic_enable_ccpa'); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_enable_ccpa"><?php _e( 'Enable U.S. CCPA Compliance', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_enable_ccpa" name="unic_enable_ccpa">
										<option value="no" <?php selected( $unic_enable_ccpa, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
										<option value="yes" <?php selected( $unic_enable_ccpa, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent-cmp' ); ?></option>
									</select>
								</div>

								<div class="unis-form-group">
									<label class="unis-label" for="unic_company"><?php _e( 'Website Name (Optional)', 'uniconsent-cmp' ); ?></label>
									<input type="text" class="unis-input" id="unic_company" name="unic_company" 
										   value="<?php echo esc_attr(get_option( 'unic_company' )); ?>" 
										   placeholder="<?php esc_attr_e( 'Enter your website name...', 'uniconsent-cmp' ); ?>">
								</div>

								<div class="unis-form-group">
									<label class="unis-label" for="unic_logo"><?php _e( 'Website LOGO URL (Optional)', 'uniconsent-cmp' ); ?></label>
									<input type="text" class="unis-input" id="unic_logo" name="unic_logo" 
										   value="<?php echo esc_url(get_option( 'unic_logo' )); ?>" 
										   placeholder="<?php esc_attr_e( 'Enter your logo URL...', 'uniconsent-cmp' ); ?>">
								</div>

								<div class="unis-form-group">
									<label class="unis-label" for="unic_policy_url"><?php _e( 'Policy URL (Optional)', 'uniconsent-cmp' ); ?></label>
									<input type="text" class="unis-input" id="unic_policy_url" name="unic_policy_url" 
										   value="<?php echo esc_url(get_option( 'unic_policy_url' )); ?>" 
										   placeholder="https://www.example.com/policy">
									<div class="unis-help-text">
										<strong><?php _e( 'Example:', 'uniconsent-cmp' ); ?></strong> <?php _e( 'https://www.example.com/policy', 'uniconsent-cmp' ); ?>
									</div>
								</div>

								<div class="unis-upgrade-banner">
									<div class="unis-upgrade-banner__text">
										<strong><?php _e( 'You are on the free plan: up to 50,000 users per month.', 'uniconsent-cmp' ); ?></strong>
										<span><?php _e( 'Upgrade for higher traffic, custom banner text, consent analytics, cookie scanning, and consent logging.', 'uniconsent-cmp' ); ?></span>
									</div>
									<a href="https://app.uniconsent.com/app/register?utm_source=wp_upgrade" target="_blank" class="unis-upgrade__cta unis-upgrade-banner__cta"><?php _e( 'Upgrade Now →', 'uniconsent-cmp' ); ?></a>
								</div>

								<?php endif;?>

								<div class="unis-form-group">
									<label class="unis-label" for="unic_license"><?php _e( 'License key (Optional)', 'uniconsent-cmp' ); ?></label>
									<input type="text" class="unis-input" id="unic_license" name="unic_license" 
										   value="<?php echo esc_attr(get_option( 'unic_license' )); ?>" 
										   placeholder="<?php esc_attr_e( 'Enter your license key...', 'uniconsent-cmp' ); ?>">
									<div class="unis-help-text">
										<p><?php _e( '* Get your free license key at:', 'uniconsent-cmp' ); ?> <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a> <?php _e( 'to unlock more features.', 'uniconsent-cmp' ); ?></p>
										<p><?php _e( '* The free version supports up to 50,000 users per month. For higher traffic, upgrade your plan at', 'uniconsent-cmp' ); ?> <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a>.</p>
										<p><?php _e( '* The configurations are managed at', 'uniconsent-cmp' ); ?> <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a> <?php _e( 'once you have entered the license key:', 'uniconsent-cmp' ); ?> <b>license-xxxxxxxx</b>.</p>
									</div>
								</div>

								<div class="unis-form-group">
									<button type="submit" class="unis-save-button">
										<span class="unis-save-button__text"><?php _e( 'Save Changes', 'uniconsent-cmp' ); ?></span>
									</button>
								</div>
							</form>
						</section>
					</div>

					<!-- Support Tab Content -->
					<div id="support-content" class="unis-tab-content">
						<section class="unis-section">
							<div class="unis-section__header">
								<h2 class="unis-section__title"><?php _e( 'Support Center', 'uniconsent-cmp' ); ?></h2>
								<p class="unis-section__subtitle"><?php _e( 'Get help and find answers to your questions', 'uniconsent-cmp' ); ?></p>
							</div>

							<div class="unis-support-grid">
								<div class="unis-support-card">
									<div class="unis-support-card__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
									<h3 class="unis-support-card__title"><?php _e( 'Documentation', 'uniconsent-cmp' ); ?></h3>
									<p class="unis-support-card__description"><?php _e( 'Comprehensive guides and tutorials to help you get started and make the most of our plugin.', 'uniconsent-cmp' ); ?></p>
									<a href="https://www.uniconsent.com/docs" class="unis-support-card__link"><?php _e( 'View Documentation', 'uniconsent-cmp' ); ?> →</a>
								</div>

								<div class="unis-support-card">
									<div class="unis-support-card__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg></div>
									<h3 class="unis-support-card__title"><?php _e( 'Email Support', 'uniconsent-cmp' ); ?></h3>
									<p class="unis-support-card__description"><?php _e( 'Send us an email and we\'ll get back to you within 24 hours with a detailed response.', 'uniconsent-cmp' ); ?></p>
									<a href="mailto:support@uniconsent.com" class="unis-support-card__link"><?php _e( 'Send Email', 'uniconsent-cmp' ); ?> →</a>
								</div>
							</div>
						</section>

						<section class="unis-section">
							<div class="unis-section__header">
								<h2 class="unis-section__title"><?php _e( 'Frequently Asked Questions', 'uniconsent-cmp' ); ?></h2>
								<p class="unis-section__subtitle"><?php _e( 'Quick answers to common questions', 'uniconsent-cmp' ); ?></p>
							</div>

							<div class="unis-faq">
								<div class="unis-faq__item">
									<button class="unis-faq__question"><?php _e( 'How do I get started with UniConsent?', 'uniconsent-cmp' ); ?></button>
									<div class="unis-faq__answer"><?php _e( 'Install and activate the plugin, then configure your consent settings on the Settings tab. Enable GDPR and/or CCPA compliance, choose your language and CMP style, and save. The consent banner will appear on your site automatically.', 'uniconsent-cmp' ); ?></div>
								</div>

								<div class="unis-faq__item">
									<button class="unis-faq__question"><?php _e( 'Do I need a license key?', 'uniconsent-cmp' ); ?></button>
									<div class="unis-faq__answer"><?php _e( 'No, the plugin works without a license key with all core features including IAB TCF 2.3, Google Consent Mode v2, and 11 banner styles, for up to 50,000 users per month. To unlock advanced features such as custom CSS, consent analytics, cookie scanning, and consent logging, or to support higher traffic, register for a free license key at', 'uniconsent-cmp' ); ?> <a href="https://www.uniconsent.com/" target="_blank">uniconsent.com</a>.</div>
								</div>

								<div class="unis-faq__item">
									<button class="unis-faq__question"><?php _e( 'What is IAB TCF 2.3 and do I need it?', 'uniconsent-cmp' ); ?></button>
									<div class="unis-faq__answer"><?php _e( 'IAB TCF (Transparency and Consent Framework) 2.3 is an industry standard for managing user consent for online advertising. If you use Google AdSense, Google Ad Manager, or programmatic advertising, enabling IAB TCF 2.3 is recommended to stay compliant.', 'uniconsent-cmp' ); ?></div>
								</div>

								<div class="unis-faq__item">
									<button class="unis-faq__question"><?php _e( 'Where are my settings managed after entering a license key?', 'uniconsent-cmp' ); ?></button>
									<div class="unis-faq__answer"><?php _e( 'Once you enter a license key (format: license-xxxxxxxx), your CMP configurations are managed through the UniConsent dashboard at', 'uniconsent-cmp' ); ?> <a href="https://app.uniconsent.com/" target="_blank">app.uniconsent.com</a>. <?php _e( 'The WordPress plugin will load your configuration automatically.', 'uniconsent-cmp' ); ?></div>
								</div>

							</div>
						</section>
					</div>
				</div>

				<!-- Sidebar -->
				<aside class="unis-sidebar">
					<!-- Upgrade Card -->
					<div class="unis-upgrade">
						<h3 class="unis-upgrade__title"><?php _e( 'Unlock More with a Free Account', 'uniconsent-cmp' ); ?></h3>
						<p class="unis-upgrade__subtitle"><?php _e( 'Register for a free license key to access advanced features:', 'uniconsent-cmp' ); ?></p>
						<ul class="unis-upgrade__features">
							<li class="unis-upgrade__feature"><?php _e( 'Custom banner text and translations', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Custom CSS styling', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Custom vendor and purpose lists', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Consent rate analytics dashboard', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Website cookie discovery and disclosure', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'JavaScript and cookie blocking', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'ConsentDB consent logging', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'LGPD, POPIA, PIPL, PDPD compliance', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'US state privacy laws (VA, CO, CT, UT)', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Google GAM / AdSense / AdX support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Prebid.js and header bidding support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'First-party CMP domain (Pro)', 'uniconsent-cmp' ); ?></li>
						</ul>
						<a href="https://app.uniconsent.com/app/register?utm_source=wp" class="unis-upgrade__cta"><?php _e( 'Get Free License Key →', 'uniconsent-cmp' ); ?></a>
					</div>

					<!-- Included Features -->
					<div class="unis-upgrade" style="margin-top: 16px;">
						<h3 class="unis-upgrade__title"><?php _e( 'Included in This Plugin', 'uniconsent-cmp' ); ?></h3>
						<ul class="unis-upgrade__features">
							<li class="unis-upgrade__feature"><?php _e( 'Up to 50,000 users per month', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Certified Google CMP (Gold Tier)', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Google Consent Mode v2', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'IAB TCF 2.3 & IAB GPP 1.1', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Microsoft UET Consent Mode', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'GDPR & CCPA compliance', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( '11 banner styles + popup', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( '52+ languages', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Privacy badge', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Support:', 'uniconsent-cmp' ); ?> support@uniconsent.com</li>
						</ul>
					</div>
				</aside>
			</main>
		</div>
		<?php
	}
} 
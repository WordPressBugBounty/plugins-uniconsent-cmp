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

								<?php $unic_enable_ccpa = get_option( 'unic_enable_ccpa'); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_enable_ccpa"><?php _e( 'Enable U.S. CCPA Compliance', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_enable_ccpa" name="unic_enable_ccpa">
										<option value="no" <?php selected( $unic_enable_ccpa, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
										<option value="yes" <?php selected( $unic_enable_ccpa, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent-cmp' ); ?></option>
									</select>
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

								<?php $unic_type = get_option( 'unic_type' ); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_type"><?php _e( 'CMP Style', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_type" name="unic_type">
										<option value="bar" <?php selected( $unic_type, 'bar' ); ?>><?php _e( 'Banner', 'uniconsent-cmp' ); ?></option>
										<option value="popup" <?php selected( $unic_type, 'popup' ); ?>><?php _e( 'Popup Box', 'uniconsent-cmp' ); ?></option>
									</select>
								</div>

								<?php $unic_enable_iab = get_option( 'unic_enable_iab'); ?>
								<div class="unis-form-group">
									<label class="unis-label" for="unic_enable_iab"><?php _e( 'IAB TCF Compliance', 'uniconsent-cmp' ); ?></label>
									<select class="unis-select" id="unic_enable_iab" name="unic_enable_iab">
										<option value="no" <?php selected( $unic_enable_iab, 'no' ); ?>><?php _e( 'No', 'uniconsent-cmp' ); ?></option>
										<option value="v2" <?php selected( $unic_enable_iab, 'v2' ); ?>><?php _e( 'IAB TCF 2.2', 'uniconsent-cmp' ); ?></option>
									</select>
								</div>

								<?php endif;?>

								<div class="unis-form-group">
									<label class="unis-label" for="unic_license"><?php _e( 'License key (Optional)', 'uniconsent-cmp' ); ?></label>
									<input type="text" class="unis-input" id="unic_license" name="unic_license" 
										   value="<?php echo esc_attr(get_option( 'unic_license' )); ?>" 
										   placeholder="<?php esc_attr_e( 'Enter your license key...', 'uniconsent-cmp' ); ?>">
									<div class="unis-help-text">
										<p><?php _e( '* Get your free license key at:', 'uniconsent-cmp' ); ?> <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a> <?php _e( 'to unlock more features.', 'uniconsent-cmp' ); ?></p>
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
									<div class="unis-faq__answer"><?php _e( 'No, the plugin works without a license key with basic features. To unlock advanced features such as IAB TCF 2.2, Google Consent Mode v2, analytics dashboard, and full customisation, register for a free license key at', 'uniconsent-cmp' ); ?> <a href="https://www.uniconsent.com/" target="_blank">uniconsent.com</a>.</div>
								</div>

								<div class="unis-faq__item">
									<button class="unis-faq__question"><?php _e( 'What is IAB TCF 2.2 and do I need it?', 'uniconsent-cmp' ); ?></button>
									<div class="unis-faq__answer"><?php _e( 'IAB TCF (Transparency and Consent Framework) 2.2 is an industry standard for managing user consent for online advertising. If you use Google AdSense, Google Ad Manager, or programmatic advertising, enabling IAB TCF 2.2 is recommended to stay compliant.', 'uniconsent-cmp' ); ?></div>
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
						<h3 class="unis-upgrade__title">UniConsent Cookie Consent CMP</h3>
						<ul class="unis-upgrade__features">
							<li class="unis-upgrade__feature"><?php _e( 'Certified EU IAB TCF 2.2/2.3 CMP', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Certified Canada IAB TCF CMP', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Certified Google CMP (Gold Tier)', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Google Consent Mode v2', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Microsoft UET Consent Mode', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'IAB GPP 1.1 compliance', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( '40+ Languages support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'GPP, TCF, USP Consent signals', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'For GDPR, CCPA, LGPD, PDPA, CPRA, PIPL', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'More popup UI choices and easy mode', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Fully customisable consent collection pop-ups and bars', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Multiple languages support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Data analytics and insight dashboard', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'One-tag Implementation', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Google GAM/Google AdSense/Google AdX/Amazon APS Support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Prebid.js and Header bidding support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Cookie ePrivacy consent support', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Website cookie discovery and disclosure', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'JavaScript and cookie blocking', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Consent rate analytics and insight', 'uniconsent-cmp' ); ?></li>
							<li class="unis-upgrade__feature"><?php _e( 'Support:', 'uniconsent-cmp' ); ?> support@uniconsent.com</li>
						</ul>
						<a href="https://app.uniconsent.com/app/register?utm_source=wp" class="unis-upgrade__cta"><?php _e( 'Get Started', 'uniconsent-cmp' ); ?></a>
					</div>
				</aside>
			</main>
		</div>
		<?php
	}
} 
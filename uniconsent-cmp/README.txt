=== UniConsent Cookie Consent CMP - Consent Manager ===
Version: 1.8.0
Contributors: uniconsent
Tags: cmp, cookie banner, cookie consent, iab, cookie
Requires at least: 5.0
Tested up to: 7.1.0
Requires PHP: 7.4
Stable tag: 1.8.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Leading Consent Management Platform for IAB TCF, GPP, GDPR, POPIA, CCPA, COPPA, and LGPD Compliance.

== Description ==

[UniConsent](https://www.uniconsent.com/) is a leading Consent Management Platform (CMP) that helps websites comply with global privacy regulations including [GDPR](https://www.uniconsent.com/gdpr), [CCPA/CPRA](https://www.uniconsent.com/ccpa), COPPA, [LGPD](https://www.uniconsent.com/lgpd), PIPL, POPIA, and [PDPA](https://www.uniconsent.com/pdpa).

Add a GDPR and CCPA cookie consent banner to your site in minutes, with no coding. The plugin is free for up to 50,000 users per month and works without an account.

= Choose your banner type =

* **Cookie categories**: a cookie banner where visitors accept or reject each cookie category. Choices are passed to Google Consent Mode v2 and Microsoft UET Consent Mode, so it suits most sites, including sites that use Google Analytics or run Google Ads or Microsoft Ads (Bing Ads) campaigns with conversion and remarketing pixels.
* **IAB TCF 2.4**: for sites that show ads through Google AdSense, Google Ad Manager, Google AdX, or other programmatic ad networks. Google requires a certified IAB TCF CMP to serve ads to visitors in the EEA, UK, and Switzerland.

= Certifications =

* **Certified EU IAB TCF 2.4 CMP**
* **Certified Canada IAB TCF CMP**
* **Certified Google Consent Mode CMP (Gold Tier)**

= Features =

* Cookie categories or IAB TCF 2.4 cookie consent banner
* 11 banner styles with visual preview: Bottom Sheet, Floating Card, Dark Compact, Popup, and more
* Google Consent Mode v2
* Microsoft UET and Bing Ads Consent Mode
* IAB GPP 1.1 consent signals
* EU IAB TCF 2.4, TCF Canada, CCPA USP, and US state consent signals
* Works with Google Ad Manager, Google AdX, Google AdSense, Prebid.js, and Amazon APS through IAB TCF 2.4
* GEO targeting: show the consent banner to all visitors or only to visitors in the EU/EEA
* 52+ languages, with automatic detection of the visitor's browser language
* Privacy settings button so visitors can change their consent at any time
* Uses your site title and WordPress privacy policy page automatically
* Loads with a single tag at the top of the page
* WP Consent API compatible
* Up to 50,000 users per month

= More with a UniConsent account =

Create a UniConsent account, configure your banner in the dashboard, and paste your license key into the plugin to unlock advanced features such as custom CSS, consent analytics, cookie scanning, and consent logging:

* More than 50,000 users per month
* Custom banner text, translations, and custom CSS styling
* Custom purposes, IAB vendors, Google vendors, and custom vendors
* Website cookie discovery and disclosure
* JavaScript and cookie blocking for tags such as Facebook Pixel and LinkedIn Pixel
* Consent rate analytics dashboard and ConsentDB consent logging
* Header bidding support for Prebid.js and Amazon APS
* First-party CMP domain

= How It Works =

1. Install and activate the plugin.
2. Choose a banner type, banner style, and language.
3. Save. The cookie consent banner appears on your site automatically.

Keep updated on [Data Privacy Regtech News](https://www.uniconsent.com/blog).

== Installation ==

1. In WordPress, go to Plugins > Add New, search for "UniConsent", then install and activate the plugin. You can also upload the `uniconsent-cmp` folder to the `/wp-content/plugins/` directory and activate it on the Plugins page.
2. Open **UniConsent CMP** in the admin menu.
3. Choose a banner type, banner style, and language, and save.
4. Optional: paste the license key from your UniConsent dashboard to manage your banner there.

== Frequently Asked Questions ==

= Which banner type should I choose? =

Choose Cookie categories if you don't show ads on your site. It suits most sites, including sites that use Google Analytics or run Google Ads or Microsoft Ads campaigns with conversion and remarketing pixels. Choose IAB TCF 2.4 if you show ads on your site through Google AdSense, Google Ad Manager, or other programmatic ad networks.

= Does it work with Google Consent Mode and Microsoft UET? =

Yes. The plugin loads at the top of the page and sets Google Consent Mode v2 to "denied" until the visitor makes a choice. It then passes the choice to both Google Consent Mode and Microsoft UET Consent Mode. You don't need to add any code: keep your Google tag, Google Tag Manager, or UET tag as it is.

= Who sees the banner? =

With Cookie categories, all visitors see the banner. With IAB TCF 2.4, you can show it to all visitors or only to visitors in the EU/EEA.

= I saved my settings but the banner didn't change. Why? =

Your browser remembers the choice you already made. Open your site in a private browser window to see it as a new visitor. If you use a caching plugin or a CDN, clear its cache after saving.

= Can I add my own link to reopen the consent banner? =

Yes. Add this link anywhere on your site, for example in a Custom HTML block in your footer:

`<a href="#" onclick="window.__unicapi('openunic');return false;">Privacy settings</a>`

= Is this CMP solution free? =

Yes. The WordPress plugin works without an account for up to 50,000 users per month, with both banner types, Google Consent Mode v2, Microsoft UET Consent Mode, 11 banner styles, and 52+ languages.

= What more can I do with a UniConsent account? =

Create an account at [uniconsent.com](https://www.uniconsent.com/), configure your banner in the dashboard, and paste your license key into the plugin. The dashboard adds custom banner text and CSS, consent analytics, cookie scanning, script blocking, consent logging, and support for more than 50,000 users per month.

= What is GDPR? =

The General Data Protection Regulation (GDPR) went into effect on May 25, 2018. It applies to any business, whether or not it is based in the EU, that processes the personal data of people in the EU.

Organizations found in non-compliance can face fines of up to €20 million or 4 percent of global annual turnover, whichever is higher.

= What is GDPR Consent and CMP? =

Consent should be given by a clear affirmative act establishing a freely given, specific, informed and unambiguous indication of the data subject's agreement to the processing of personal data relating to him or her, such as by a written statement, including by electronic means, or an oral statement. This could include ticking a box when visiting an internet website, choosing technical settings for information society services or another statement or conduct which clearly indicates in this context the data subject's acceptance of the proposed processing of his or her personal data.

CMP is the technical infrastructure a business uses to collect and store what data customers have consented to be used and for what.

= Is UniConsent an IAB EU approved CMP? =

Yes, UniConsent is an IAB approved Consent Management Provider.

NOTICE: ACTIVATING THIS PLUGIN DOES NOT GUARANTEE YOU FULLY COMPLY WITH GDPR. PLEASE CONTACT A GDPR CONSULTANT OR LAW FIRM TO ASSESS NECESSARY MEASURES.

= How does UniConsent, or a Consent Management Provider (CMP) solution work? =

UniConsent, or any other IAB approved Consent Management Provider (CMP), provides publishers and advertisers with a mechanism to obtain consent, and then control which third-party vendors can request consent to track users of their websites and apps.

= What is the difference between UniConsent and the other CMP? =

* Cookie categories and IAB TCF 2.4 banner types
* 11 banner styles with visual preview cards
* GEO targeting: show consent banners only in specific regions
* Certified IAB TCF 2.4 and Google Consent Mode CMP
* Support IAB vendors, Google GAM vendors, and custom vendors
* Google Consent Mode v2 and Microsoft UET Consent Mode
* 52+ languages
* High opt-in rate with minimal impact on ad revenue
* Cookie ePrivacy consent support

== Screenshots ==

1. UniConsent - stage one: Initial popup screen.
2. UniConsent - stage two: purpose consent screen.
3. UniConsent - stage three: IAB TCF vendor consent screen.
4. UniConsent - stage four: Custom vendor consent screen.
5. UniConsent - stage five: Cookies list screen.
6. UniConsent - stage six: Initial bar screen.

== Changelog ==

= 1.8.0 =
* New Banner Type setting: Cookie categories (default for new installs) or IAB TCF 2.4
* Cookie categories passes consent to Google Consent Mode v2 and Microsoft UET Consent Mode
* Automatic language option that follows the visitor's browser language (default for new installs)
* Use the site title and WordPress privacy policy page when the name or policy URL is left empty
* Load the CMP with a single synchronous tag at the top of the page head
* Settings page updates after saving, without a page reload
* Fix: saving with a license key no longer resets the other settings
* Show only the settings that apply to the selected banner type; removed GDPR and CCPA toggles that had no effect
* Clearer settings wording, more FAQs, and a dashboard link when a license key is set
* Update IAB TCF references to 2.4

= 1.7.2 =
* Accept license key as license-xxxx, key-xxxx or the bare project ID, normalize it on save, and show an admin notice when the key is invalid

= 1.7.1 =
* Publisher country setting for IAB TCF publisherCountryCode

= 1.7.0 =
* 11 visual banner styles with preview cards
* Option to show or hide privacy badge
* 52+ languages support

= 1.6.4 =
* Improve UI

= 1.6.1 =
* Improvement

= 1.6.0 =
* WP Consent API Support

= 1.5.7 =
* Fix warning for PHP 8.2+

= 1.5.6 =
* Microsoft UET Consent Mode
* Google Consent Mode 2.0
* IAB GPP 1.1 compliance

= 1.5.5 =
* Optimize and improvements

= 1.5.3 =
* Improve Google Consent Mode

= 1.5.2 =
* Improve Consent Mode and support 40 languages

= 1.5.1 =
* Improve GPP API

= 1.5.0 =
* Improve Google Consent mode V2 default status

= 1.4.9 =
* Improve GPP consent performance
* Improve Google Consent mode v2

= 1.4.8 =
* Improve consent mode
* Improve tag loading

= 1.4.7 =
* IAB GPP 1.1 support

= 1.4.6 =
* IAB TCF 2.2 support

= 1.4.5 =
* Security enhancement and fixes

= 1.4.2 =
* GPP consent signals
* TCF Canada consent signals

= 1.3.11 =
* Optimise consent rate performance.
* Optimise performance, updated for IAB TCF changes.

= 1.3.8 =
* Support simple mode and performance update.

= 1.3.1 =
* Support more languages.

= 1.3.0 =
* Added IAB TCF 1.1 notice.

= 1.2.12 =
* Enable IAB TCF 2.0.

= 1.2.11 =
* Google Ad Manager Consent support.

= 1.2.10 =
* Performance update.

= 1.2.8 =
* UniConsent v2 added.

= 1.2.5 =
* CCPA added.

= 1.2.4 =
* Bug fixed.

= 1.2.0 =
* Performance improvement.

= 1.1.29 =
* Bug fixed.

= 1.1.27 =
* Dutch language support added.

= 1.1.26 =
* Load third party tags and GTM.

= 1.1.25 =
* Optimise the performance

= 1.1.22 =
* License key support

= 1.1.13 =
* Test for wordpress 5.0

= 1.1.12 =
* Bug fixed.

= 1.1.10 =
* Update readme.

= 1.1.7 =
* Updated version.

= 1.1.6 =
* Updated.

= 1.1.4 =
* Logo added for consent.

= 1.1.3 =
* 100K users free.

= 1.1.0 =
* Performance upgraded.

= 1.0.9 =
* Optimised js tag.

= 1.0.8 =
* Updated stub.

= 1.0.6 = 
* Multiple languages supported.

= 1.0.4 = 
* Bar or popup Box style choice added.

= 1.0.0 =
* Initial Plugin Release

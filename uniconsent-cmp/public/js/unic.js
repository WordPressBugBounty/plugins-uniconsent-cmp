// terser unic.js -o unic.min.js -c -m
function unic_wp_set_consent(type, value) {
  if (typeof window.wp_set_consent == 'function') {
    wp_set_consent(type, value);
  }
}

function unic_wp_sync_consent() {
  var dataLayer = window.dataLayer || [];
  // Find last unic_data event
  for (var i = dataLayer.length - 1; i >= 0; i--) {
    var dlEvent = dataLayer[i];
    if (dlEvent.event === 'unic_data') {
      var consent = dlEvent.CONSENT_MODE || {};
      var isOptIn = dlEvent.LOC === 'EU' || dlEvent.LOC === 'BR' || dlEvent.LOC === 'ZA';

      window.wp_consent_type = isOptIn ? 'optin' : 'optout';
      document.dispatchEvent(new CustomEvent('wp_consent_type_defined'));

      var set = unic_wp_set_consent;

      if (consent.functionality_storage === 'granted') {
        set('functional', 'allow');
      } else {
        set('functional', 'deny');
      }
      if (
        consent.ad_storage === 'granted' ||
        consent.ad_user_data === 'granted' ||
        consent.ad_personalization === 'granted'
      ) {
        set('marketing', 'allow');
      } else {
        set('marketing', 'deny');
      }
      if (consent.analytics_storage === 'granted') {
        set('statistics', 'allow');
        set('statistics-anonymous', 'allow');
      } else {
        set('statistics', 'deny');
        set('statistics-anonymous', 'deny');
      }
      if (consent.personalization_storage === 'granted') {
        set('preferences', 'allow');
      } else {
        set('preferences', 'deny');
      }
      break; // Stop after first match
    }
  }
}

(function waitForUnicData() {
  if (!window.dataLayer || !window.dataLayer.push) {
    setTimeout(waitForUnicData, 100);
    return;
  }

  // Patch push method to listen for future unic_data events
  var originalPush = window.dataLayer.push;
  window.dataLayer.push = function () {
    for (var i = 0; i < arguments.length; i++) {
      if (arguments[i] && arguments[i].event === 'unic_data') {
        setTimeout(unic_wp_sync_consent, 0);
      }
    }
    return originalPush.apply(this, arguments);
  };

  // Wait for first unic_data event
  (function waitForInitialUnic() {
    var found = window.dataLayer.some(function (e) {
      return e && e.event === 'unic_data';
    });
    if (found) {
      unic_wp_sync_consent();
    } else {
      setTimeout(waitForInitialUnic, 100);
    }
  })();
})();
jQuery(document).ready(function($) {
    // Tab switching functionality
    $('.unis-nav__link').on('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all links and contents
        $('.unis-nav__link').removeClass('unis-nav__link--active');
        $('.unis-tab-content').removeClass('unis-tab-content--active');
        
        // Add active class to clicked link
        $(this).addClass('unis-nav__link--active');
        
        // Show corresponding content
        const tabId = $(this).data('tab') + '-content';
        $('#' + tabId).addClass('unis-tab-content--active');
    });

    // FAQ functionality
    $('.unis-faq__question').on('click', function() {
        const $answer = $(this).next('.unis-faq__answer');
        const isActive = $(this).hasClass('unis-faq__question--active');
        
        // Close all other FAQs
        $('.unis-faq__question').removeClass('unis-faq__question--active');
        $('.unis-faq__answer').removeClass('unis-faq__answer--active');
        
        // Toggle current FAQ
        if (!isActive) {
            $(this).addClass('unis-faq__question--active');
            $answer.addClass('unis-faq__answer--active');
        }
    });

    // Form submission with AJAX
    $('#uniconsent-settings-form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $saveButton = $('.unis-save-button');
        const $buttonText = $saveButton.find('.unis-save-button__text');
        
        // Set loading state
        $saveButton.prop('disabled', true).addClass('unis-save-button--loading');
        $buttonText.text('Saving...');
        
        // Remove any existing spinners first
        $saveButton.find('.unis-save-button__spinner').remove();
        
        // Add spinner
        const $spinner = $('<div class="unis-save-button__spinner"></div>');
        $saveButton.prepend($spinner);

        const formData = new FormData(this);
        
        // Remove the WordPress 'update' action and add our custom action
        formData.delete('action');
        formData.append('action', 'save_uniconsent_settings');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showToast(
                        'Settings Saved!', 
                        'Your UniConsent settings have been successfully updated.',
                        'success'
                    );
                } else {
                    showToast(
                        'Save Failed!', 
                        response.data || 'Failed to save settings. Please try again.',
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                showToast(
                    'Save Failed!', 
                    'Network error occurred. Please check your connection and try again.',
                    'error'
                );
            },
            complete: function() {
                // Reset button state
                $saveButton.prop('disabled', false).removeClass('unis-save-button--loading');
                $buttonText.text('Save Changes');
                
                // Remove spinner
                $saveButton.find('.unis-save-button__spinner').remove();
            }
        });
    });

    // Toast notification system
    function showToast(title, message, type = 'success') {
        // Remove existing toast if any
        $('.unis-toast').remove();

        // Build toast element safely using DOM methods to prevent XSS
        var validType = (type === 'success' || type === 'error') ? type : 'success';
        var toast = $('<div>').addClass('unis-toast unis-toast--' + validType);
        var icon = $('<div>').addClass('unis-toast__icon').text(validType === 'success' ? '\u2713' : '\u2715');
        var content = $('<div>').addClass('unis-toast__content');
        var titleEl = $('<div>').addClass('unis-toast__title').text(title);
        var messageEl = $('<div>').addClass('unis-toast__message').text(message);
        var closeBtn = $('<button>').addClass('unis-toast__close').html('&times;');

        content.append(titleEl).append(messageEl);
        toast.append(icon).append(content).append(closeBtn);

        // Add to document
        $('body').append(toast);

        // Show toast with animation
        setTimeout(() => {
            toast.addClass('unis-toast--show');
        }, 100);

        // Auto hide after 5 seconds
        setTimeout(() => {
            hideToast(toast);
        }, 5000);

        // Close button functionality
        toast.find('.unis-toast__close').on('click', () => hideToast(toast));

        return toast;
    }

    function hideToast($toast) {
        $toast.removeClass('unis-toast--show');
        setTimeout(() => {
            $toast.remove();
        }, 300);
    }
});
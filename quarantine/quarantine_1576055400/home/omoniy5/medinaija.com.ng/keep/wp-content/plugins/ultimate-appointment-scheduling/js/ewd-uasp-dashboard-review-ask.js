jQuery(document).ready(function($) {
	jQuery('.ewd-uasp-main-dashboard-review-ask').css('display', 'block');

	jQuery('.ewd-uasp-main-dashboard-review-ask').on('click', function(event) {
		if (jQuery(event.srcElement).hasClass('notice-dismiss')) {
			var data = 'Ask_Review_Date=3&action=ewd_uasp_hide_review_ask';
        	jQuery.post(ajaxurl, data, function() {});
        }
	});

	jQuery('.ewd-uasp-review-ask-yes').on('click', function() {
		jQuery('.ewd-uasp-review-ask-feedback-text').removeClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-starting-text').addClass('uasp-hidden');

		jQuery('.ewd-uasp-review-ask-no-thanks').removeClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-review').removeClass('uasp-hidden');

		jQuery('.ewd-uasp-review-ask-not-really').addClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-yes').addClass('uasp-hidden');

		var data = 'Ask_Review_Date=7&action=ewd_uasp_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-uasp-review-ask-not-really').on('click', function() {
		jQuery('.ewd-uasp-review-ask-review-text').removeClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-starting-text').addClass('uasp-hidden');

		jQuery('.ewd-uasp-review-ask-feedback-form').removeClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-actions').addClass('uasp-hidden');

		var data = 'Ask_Review_Date=7&action=ewd_uasp_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-uasp-review-ask-no-thanks').on('click', function() {
		var data = 'Ask_Review_Date=1000&action=ewd_uasp_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-uasp-main-dashboard-review-ask').css('display', 'none');
	});

	jQuery('.ewd-uasp-review-ask-review').on('click', function() {
		jQuery('.ewd-uasp-review-ask-feedback-text').addClass('uasp-hidden');
		jQuery('.ewd-uasp-review-ask-thank-you-text').removeClass('uasp-hidden');

		var data = 'Ask_Review_Date=1000&action=ewd_uasp_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-uasp-review-ask-send-feedback').on('click', function() {
		var Feedback = jQuery('.ewd-uasp-review-ask-feedback-explanation textarea').val();
		var data = 'Feedback=' + Feedback + '&action=ewd_uasp_send_feedback';
        jQuery.post(ajaxurl, data, function() {});

        var data = 'Ask_Review_Date=1000&action=ewd_uasp_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-uasp-review-ask-feedback-form').addClass('uasp-hidden');
        jQuery('.ewd-uasp-review-ask-review-text').addClass('uasp-hidden');
        jQuery('.ewd-uasp-review-ask-thank-you-text').removeClass('uasp-hidden');
	});
});
<?php
/* Add any update or error notices to the top of the admin page */
function EWD_UASP_Error_Notices(){
    global $ewd_uasp_message;
	if (isset($ewd_uasp_message)) {
		if (isset($ewd_uasp_message['Message_Type']) and $ewd_uasp_message['Message_Type'] == "Update") {echo "<div class='updated'><p>" . $ewd_uasp_message['Message'] . "</p></div>";}
		if (isset($ewd_uasp_message['Message_Type']) and $ewd_uasp_message['Message_Type'] == "Error") {echo "<div class='error'><p>" . $ewd_uasp_message['Message'] . "</p></div>";}
	}

	$Ask_Review_Date = get_option('EWD_UASP_Ask_Review_Date');
	if ($Ask_Review_Date == "") {$Ask_Review_Date = get_option("EWD_UASP_Install_Time") + 3600*24*4;}

	if ($Ask_Review_Date < time() and get_option("EWD_UASP_Install_Time") < time() - 3600*24*4) { ?>

		<div class='notice notice-info is-dismissible ewd-uasp-main-dashboard-review-ask' style='display:none'>
			<div class='ewd-uasp-review-ask-plugin-icon'></div>
			<div class='ewd-uasp-review-ask-text'>
				<p class='ewd-uasp-review-ask-starting-text'>Enjoying using the Ultimate Appointment Scheduling plugin?</p>
				<p class='ewd-uasp-review-ask-feedback-text uasp-hidden'>Help us make the plugin better! Please take a minute to rate the plugin. Thanks!</p>
				<p class='ewd-uasp-review-ask-review-text uasp-hidden'>Please let us know what we could do to make the plugin better!<br /><span>(If you would like a response, please include your email address.)</span></p>
				<p class='ewd-uasp-review-ask-thank-you-text uasp-hidden'>Thank you for taking the time to help us!</p>
			</div>
			<div class='ewd-uasp-review-ask-actions'>
				<div class='ewd-uasp-review-ask-action ewd-uasp-review-ask-not-really ewd-uasp-review-ask-white'>Not Really</div>
				<div class='ewd-uasp-review-ask-action ewd-uasp-review-ask-yes ewd-uasp-review-ask-green'>Yes!</div>
				<div class='ewd-uasp-review-ask-action ewd-uasp-review-ask-no-thanks ewd-uasp-review-ask-white uasp-hidden'>No Thanks</div>
				<a href='https://wordpress.org/support/plugin/ultimate-appointment-scheduling/reviews/?filter=5' target='_blank'>
					<div class='ewd-uasp-review-ask-action ewd-uasp-review-ask-review ewd-uasp-review-ask-green uasp-hidden'>OK, Sure</div>
				</a>
			</div>
			<div class='ewd-uasp-review-ask-feedback-form uasp-hidden'>
				<div class='ewd-uasp-review-ask-feedback-explanation'>
					<textarea></textarea>
				</div>
				<div class='ewd-uasp-review-ask-send-feedback ewd-uasp-review-ask-action ewd-uasp-review-ask-green'>Send Feedback</div>
			</div>
			<div class='ewd-uasp-clear'></div>
		</div>

		<?php
	}
}



